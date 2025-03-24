
<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login | EliteTradingAcademy </title>
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
                        
                        <img src="{{ asset('images/logo/logo-color.svg') }}" class="block dark:hidden" alt="Logo" />
                        <img src="{{ asset('images/logo/logo-white.svg') }}" class="hidden dark:block" alt="Logo" />
                    </a>
                </header>

                {{ $slot }}
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
                    <div class="">
                        <img src="{{  asset('images/illustration/signin.svg') }}" alt="" />
                    </div>
                    <div>
                        <div class="text-center max-w-lg px-1.5 m-auto">
                            <h3
                            class="text-bgray-900 dark:text-white font-semibold font-popins text-4xl mb-4"
                            >
                            Speady, Easy and Fast
                            </h3>
                            <p class="text-bgray-600 dark:text-bgray-50 text-sm font-medium">
                            BankCo. help you set saving goals, earn cash back offers, Go to
                            disclaimer for more details and get paychecks up to two days
                            early. Get a
                            <span class="text-success-300 font-bold">$20</span> bonus when
                            you receive qualifying direct deposits
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
