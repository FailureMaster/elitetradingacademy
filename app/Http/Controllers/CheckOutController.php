<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function checkout( Request $request, $slug )
    {
        $program = Program::where('slug', $slug)->first();

        if( $program <> null ){
            return view('checkout.show', compact('program'));
        }

        return abort(403, 'Unauthorized!');
    }
}
