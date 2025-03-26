<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Transaction;
use App\Services\PaymentService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckOutController extends Controller
{
    public function show( Request $request, $slug )
    {
        $countries = json_decode(file_get_contents(resource_path('views/partials/country.json')));

        $program = Program::where('slug', $slug)->first();

        $user = Auth::user();

        if( $program <> null ){
            return view('checkout.show', compact('program', 'countries', 'user'));
        }

        return abort(403, 'Unauthorized!');
    }

    public function checkout( Request $request )
    {
        $request->validate([
            'city'          => 'required',
            'zip_code'      => 'required',
            'address'       => 'required',
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required',
            'mobile'        => 'required',
            'cvv2'          => 'required|digits_between:1,4|numeric',
            'expiry_date' => ['required', 'regex:/^(0[1-9]|1[0-2])\/\d{2}$/'],
            'card_printed_name' => 'required',
            'credit_card_number' => 'required|digits_between:16,20|numeric',
            'program_id' => 'required'
        ]);

        DB::beginTransaction();

        try{
            $paymentService = new PaymentService();

            $countries = json_decode(file_get_contents(resource_path('views/partials/country.json')));

            $user = auth()->user();

            $baseUrl = config('app.url');

            $id = $request->program_id;
            
            $data = Program::find(Crypt::decrypt($request->program_id));

            if (!$data) {
                return redirect()->route('checkout.show', ['slug' => $request->slug])->with('error', 'Something went wrong!');
            }

            // Split the expiry date into month and year
            $expiry_date = $request->input('expiry_date'); // Example: "08/25"

            list($month, $year) = explode('/', $expiry_date); // ["08", "25"]

            // Convert year to full format (20YY)
            $fullYear = '20' . $year; // Example: "2025"

            // Now you have:
            $expiry_month = (int) $month; // 8
            $expiry_year = (int) $fullYear; // 2025

            $requestFields = [
                'client_orderid'     => $user->id,
                'order_desc'         => 'Purchase Academy Program',
                'first_name'         => $request->first_name,
                'last_name'          => $request->last_name,
                'address1'           => $request->address,
                'city'               => $request->city,
                'zip_code'           => $request->zip_code,
                'country'            => $request->country,
                'phone'              => "+".$countries->{$request->country}->dial_code.$request->mobile,
                'email'              => $request->email,
                'currency'           => 'USD',
                'ipaddress'          => request()->ip(),
                'site_url'           => $baseUrl,
                'credit_card_number' => $request->credit_card_number,
                'card_printed_name'  => $request->card_printed_name,
                'expire_month'       => $expiry_month,
                'expire_year'        => $expiry_year,
                'cvv2'               => $request->cvv2,
                'amount'             => $data->price,
            ];

            // Sign the request
            $requestFields['control'] = $paymentService->signPaymentRequest($requestFields);

            // Send the request
            $url = $paymentService->getUrl();

            $responseFields = $paymentService->sendRequest($url, $requestFields);

            if( $responseFields && trim($responseFields['type']) == "async-response" ){

                //Success, Save on the database
                $transaction = new Transaction();
                $transaction->user_id = Auth::user()->id;
                $transaction->program_id = $data->id;
                $transaction->amount = $data->price;
                $transaction->total_amount = $data->price;
                $transaction->transaction_code = $this->generateTrx();
                $transaction->status = 'pending';
                $transaction->reference_number = $responseFields['paynet-order-id'];
                $transaction->save();

                DB::commit();
                return redirect()->route('checkout.show', ['slug' => $request->slug])->with('success', 'Success!');
            }

            Log::info( 'Payment369 Failed - '. json_encode($responseFields) );

            DB::rollBack();

            if( $responseFields && trim($responseFields['type']) == "validation-error" )
                return redirect()->route('checkout.show', ['slug' => $request->slug])->with('error', trim($responseFields['error-message']));
            else
                return redirect()->route('checkout.show', ['slug' => $request->slug])->with('error', 'Transaction Failed, Contact Administrator for more information.');
        }
        catch( Exception $e ){
            DB::rollBack();
            Log::info( 'Payment369 Failed - '. $e->getMessage() );
            return redirect()->route('checkout.show', ['slug' => $request->slug])->with('error', 'Something went wrong!');
        }
    }

    function generateTrx($length = 12)
    {
        $characters = 'ABCDEFGHJKMNOPQRSTUVWXYZ123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
