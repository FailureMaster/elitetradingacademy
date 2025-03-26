
<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Checkout | {{ $program->title }} </title>
        <link rel="stylesheet" href="{{ asset('css/output.css') }}">
        @vite('resources/css/app.css')
    </head>
    <body class="h-full">
        <section class="bg-white dark:bg-darkblack-500">
            <div class="flex flex-col lg:flex-row justify-between min-h-screen">
            <!-- Left -->
            <div class="lg:w-1/2 px-5 xl:pl-12 pt-10">
                <header>
                    <a href="/" class="">
                        <img src="{{ asset('images/logo/logo-color.png') }}" class="block dark:hidden" alt="Logo" />
                        <img src="{{ asset('images/logo/logo-white.png') }}" class="hidden dark:block" alt="Logo" />
                    </a>
                </header>

                <!-- Left -->
                <div class="m-auto pt-5 pb-16" style="max-width: 620px;">
                    <header class="text-center mb-8">
                    <h2
                        class="text-bgray-900 dark:text-white text-4xl font-semibold font-poppins mb-2"
                        >
                        Checkout {{  $program->title }} Program
                        <br>
                        {{ $program->price }}  {{ $program->currency }}
                    </h2>
                    
                    </header>
                    <!-- Form -->
                    <form method="POST" action="{{ route('checkout') }}">
                    @csrf
                    <input type="hidden" name="program_id" value="{{ Crypt::encrypt($program->id) }}">
                    <input type="hidden" name="slug" value="{{ $program->slug }}">
                    <div class="flex gap-4 mb-4">
                        <div class="w-full">
                            <input
                                type="text"
                                class="text-bgray-800 dark:text-white dark:bg-darkblack-500 dark:border-darkblack-400 text-base border border-bgray-300 h-14 w-full focus:border-success-300 focus:ring-0 rounded-lg px-4 py-3.5 placeholder:text-bgray-500 placeholder:text-base "
                                placeholder="First name"
                                name="first_name"
                                required
                                value="{{ old('first_name') ?? $user->first_name }}"
                            />
                            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                        </div>
                        <div class="w-full">
                            <input
                                type="text"
                                class="text-bgray-800 dark:text-white dark:bg-darkblack-500 dark:border-darkblack-400  text-base border border-bgray-300 h-14 w-full focus:border-success-300 focus:ring-0 rounded-lg px-4 py-3.5 placeholder:text-bgray-500 placeholder:text-base"
                                placeholder="Last name"
                                name="last_name"
                                value="{{ old('last_name') ?? $user->last_name }}"
                            />
                            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                        </div>
                    </div>
                    <div class="flex gap-4 mb-4">
                        <div class="w-full">
                            <input
                            type="email"
                            class="text-bgray-800 dark:text-white dark:bg-darkblack-500 dark:border-darkblack-400  text-base border border-bgray-300 h-14 w-full focus:border-success-300 focus:ring-0 rounded-lg px-4 py-3.5 placeholder:text-bgray-500 placeholder:text-base"
                            placeholder="Email"
                            name="email"
                            required
                            value="{{ old('email') ?? $user->email }}"
                            />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="w-full">
                            <input
                            type="text"
                            class="text-bgray-800 dark:text-white dark:bg-darkblack-500 dark:border-darkblack-400  text-base border border-bgray-300 h-14 w-full focus:border-success-300 focus:ring-0 rounded-lg px-4 py-3.5 placeholder:text-bgray-500 placeholder:text-base"
                            placeholder="Mobile"
                            name="mobile"
                            required
                            value="{{ old('mobile') ?? $user->mobile }}"
                            />
                            <x-input-error :messages="$errors->get('mobile')" class="mt-2" />
                        </div>
                    </div>
                    <div class="flex gap-4 mb-4">
                        <div class="w-full">
                            <select
                            class="text-bgray-800 dark:text-white dark:bg-darkblack-500 dark:border-darkblack-400  text-base border border-bgray-300 h-14 w-full focus:border-success-300 focus:ring-0 rounded-lg px-4 py-3.5 placeholder:text-bgray-500 placeholder:text-base"
                            placeholder="Country"
                            name="country"
                            required
                            >
                                @foreach($countries as $key => $country)
                                    <option data-mobile_code="{{ $country->dial_code }}"
                                        value="{{ $key }}" data-code="{{ $key }}"
                                        {{ $user->country_code === $key ? "selected" : "" }}>{{__($country->country) }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('country')" class="mt-2" />
                        </div>
                        <div class="w-full">
                            <input
                            type="text"
                            class="text-bgray-800 dark:text-white dark:bg-darkblack-500 dark:border-darkblack-400  text-base border border-bgray-300 h-14 w-full focus:border-success-300 focus:ring-0 rounded-lg px-4 py-3.5 placeholder:text-bgray-500 placeholder:text-base"
                            placeholder="City"
                            name="city"
                            required
                            value="{{ old('city') ?? $user->city }}"
                            />
                            <x-input-error :messages="$errors->get('city')" class="mt-2" />
                        </div>
                        <div class="w-full">
                            <input
                            type="text"
                            class="text-bgray-800 dark:text-white dark:bg-darkblack-500 dark:border-darkblack-400  text-base border border-bgray-300 h-14 w-full focus:border-success-300 focus:ring-0 rounded-lg px-4 py-3.5 placeholder:text-bgray-500 placeholder:text-base"
                            placeholder="Zip"
                            name="zip_code"
                            required
                            value="{{ old('zip_code') ?? $user->zip_code }}"
                            />
                            <x-input-error :messages="$errors->get('zip_code')" class="mt-2" />
                        </div>
                    </div>
                    <div class="mb-4">
                        <input
                        type="text"
                        class="text-bgray-800 dark:text-white dark:bg-darkblack-500 dark:border-darkblack-400  text-base border border-bgray-300 h-14 w-full focus:border-success-300 focus:ring-0 rounded-lg px-4 py-3.5 placeholder:text-bgray-500 placeholder:text-base"
                        placeholder="Address"
                        name="address"
                        required
                        value="{{ old('address') ?? $user->address }}"
                        />
                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                    </div>
                    <div class="flex gap-4 mb-4">
                        <div class="w-full">
                            <input
                            type="text"
                            class="text-bgray-800 dark:text-white dark:bg-darkblack-500 dark:border-darkblack-400  text-base border border-bgray-300 h-14 w-full focus:border-success-300 focus:ring-0 rounded-lg px-4 py-3.5 placeholder:text-bgray-500 placeholder:text-base"
                            placeholder="Credit Card Number"
                            name="credit_card_number"
                            required
                            value="{{ old('credit_card_number') ?? "" }}"
                            />
                            <x-input-error :messages="$errors->get('credit_card_number')" class="mt-2" />
                        </div>
                        <div class="w-full">
                            <input
                            type="text"
                            class="text-bgray-800 dark:text-white dark:bg-darkblack-500 dark:border-darkblack-400  text-base border border-bgray-300 h-14 w-full focus:border-success-300 focus:ring-0 rounded-lg px-4 py-3.5 placeholder:text-bgray-500 placeholder:text-base"
                            placeholder="Card Printed Name"
                            name="card_printed_name"
                            required
                              value="{{ old('card_printed_name') ?? "" }}"
                            />
                            <x-input-error :messages="$errors->get('card_printed_name')" class="mt-2" />
                        </div>
                    </div>
                    <div class="flex gap-4 mb-4">
                        <div class="w-full">
                            <input
                            type="text"
                            class="text-bgray-800 dark:text-white dark:bg-darkblack-500 dark:border-darkblack-400  text-base border border-bgray-300 h-14 w-full focus:border-success-300 focus:ring-0 rounded-lg px-4 py-3.5 placeholder:text-bgray-500 placeholder:text-base"
                            placeholder="Expiry Date"
                            name="expiry_date"
                            id="expiry"
                            required
                            />
                            <x-input-error :messages="$errors->get('expiry_date')" class="mt-2" />
                        </div>
                        <div class="w-full">
                            <input
                            type="text"
                            class="text-bgray-800 dark:text-white dark:bg-darkblack-500 dark:border-darkblack-400  text-base border border-bgray-300 h-14 w-full focus:border-success-300 focus:ring-0 rounded-lg px-4 py-3.5 placeholder:text-bgray-500 placeholder:text-base"
                            placeholder="CVV2"
                            name="cvv2"
                            required
                            />
                            <x-input-error :messages="$errors->get('cvv2')" class="mt-2" />
                        </div>
                    </div>
                    <button
                        type="submit"
                        class="py-3.5 flex items-center justify-center text-white font-bold bg-success-300 hover:bg-success-400 transition-all rounded-lg w-full"
                    >
                        PAY NOW
                    </button>
                    </form>
                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 mt-2 py-3 rounded-md mb-4">
                            <p>{{ session('error') }}</p>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 mt-2 py-3 rounded-md mb-4">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif
                </div>
                </div>
                <!-- Right -->
                <div class="lg:w-1/2 lg:block hidden bg-[#F6FAFF] dark:bg-darkblack-600 p-20 relative">
                    <ul>
                        <li class="absolute top-10 left-8">
                            <img src="{{  asset('images/shapes/square.svg') }}" alt="" />
                        </li>
                        <li class="absolute right-12 top-14">
                            <img src="{{  asset('images/shapes/vline.svg') }}" alt="" />
                        </li>
                        <li class="absolute bottom-7 left-8">
                            <img src="{{  asset('images/shapes/dotted.svg') }}" alt="" />
                        </li>
                    </ul>
                    <div class="" style="width: 100%;
                            height: 450px; /* Adjust height as needed */
                            background-image: url({{  asset('images/programs/banner.jpg') }}); /* Replace with your image URL */
                            background-position: center; /* Centers the image */
                            background-size: cover; /* Makes the image cover the whole div */
                            background-repeat: no-repeat; /* Prevents image repetition */">
                    </div>
                    <div class="mt-3">
                        <div class="p-6 rounded-lg shadow-md">
                            <h2 class="text-xl font-bold text-gray-800 mb-4">What You’ll Learn:</h2>
                            <ul class="space-y-2 text-gray-700">
                                
                                @if( $program->description <> "")
                                    @foreach(json_decode($program->description) as $d)
                                        <li class="flex items-start gap-2">
                                            <span class="text-blue-500 text-lg">◆</span>
                                            <span>{{ $d }}</span>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            document.getElementById('expiry').addEventListener('input', function(e) {
                let value = this.value.replace(/\D/g, ''); // Remove non-numeric characters
                if (value.length >= 2) {
                    value = value.substring(0, 2) + '/' + value.substring(2, 4); // Add '/' after MM
                }
                this.value = value;
            
                // Validate MM (01-12)
                let mm = parseInt(value.substring(0, 2), 10);
                if (mm > 12) {
                    this.value = '12/' + value.substring(3, 5); // Set max month to 12
                }
            });
        </script>
    </body>
</html>
