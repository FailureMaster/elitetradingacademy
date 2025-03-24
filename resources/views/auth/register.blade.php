<x-guest-layout>
   <!-- Left -->
    <div class="max-w-[460px] m-auto pt-24 pb-16">
      <header class="text-center mb-8">
        <h2
          class="text-bgray-900 dark:text-white text-4xl font-semibold font-poppins mb-2"
        >
          Sign up for an account
        </h2>
        <p class="font-urbanis text-base font-medium text-bgray-600 dark:text-darkblack-300">
          Send, spend and save smarter
        </p>
      </header>
      <!-- Form -->
      <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="flex flex-col md:flex-row gap-4 justify-between mb-4">
          <div>
            <input
              type="text"
              class="text-bgray-800 dark:text-white dark:bg-darkblack-500 dark:border-darkblack-400 text-base border border-bgray-300 h-14 w-full focus:border-success-300 focus:ring-0 rounded-lg px-4 py-3.5 placeholder:text-bgray-500 placeholder:text-base "
              placeholder="First name"
              name="first_name"
            />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
          </div>
          <div>
            <input
              type="text"
              class="text-bgray-800 dark:text-white dark:bg-darkblack-500 dark:border-darkblack-400  text-base border border-bgray-300 h-14 w-full focus:border-success-300 focus:ring-0 rounded-lg px-4 py-3.5 placeholder:text-bgray-500 placeholder:text-base"
              placeholder="Last name"
              name="last_name"
            />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
          </div>
        </div>
        <div class="mb-4">
          <input
            type="email"
            class="text-bgray-800 dark:text-white dark:bg-darkblack-500 dark:border-darkblack-400  text-base border border-bgray-300 h-14 w-full focus:border-success-300 focus:ring-0 rounded-lg px-4 py-3.5 placeholder:text-bgray-500 placeholder:text-base"
            placeholder="Email"
            name="email"
          />
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="mb-6 relative">
          <input
            type="password"
            class="text-bgray-800 dark:text-white dark:bg-darkblack-500 dark:border-darkblack-400  text-base border border-bgray-300 h-14 w-full focus:border-success-300 focus:ring-0 rounded-lg px-4 py-3.5 placeholder:text-bgray-500 placeholder:text-base"
            placeholder="Password"
            name="password"
          />
          <x-input-error :messages="$errors->get('password')" class="mt-2" />
          <button class="absolute top-4 right-4 bottom-4">
            <svg
              width="22"
              height="20"
              viewBox="0 0 22 20"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M2 1L20 19"
                stroke="#718096"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M9.58445 8.58704C9.20917 8.96205 8.99823 9.47079 8.99805 10.0013C8.99786 10.5319 9.20844 11.0408 9.58345 11.416C9.95847 11.7913 10.4672 12.0023 10.9977 12.0024C11.5283 12.0026 12.0372 11.7921 12.4125 11.417"
                stroke="#718096"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M8.363 3.36506C9.22042 3.11978 10.1082 2.9969 11 3.00006C15 3.00006 18.333 5.33306 21 10.0001C20.222 11.3611 19.388 12.5241 18.497 13.4881M16.357 15.3491C14.726 16.4491 12.942 17.0001 11 17.0001C7 17.0001 3.667 14.6671 1 10.0001C2.369 7.60506 3.913 5.82506 5.632 4.65906"
                stroke="#718096"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </button>
        </div>
        <div class="mb-6 relative">
          <input
            type="password"
            class="text-bgray-800 dark:text-white dark:bg-darkblack-500 dark:border-darkblack-400  text-base border border-bgray-300 h-14 w-full focus:border-success-300 focus:ring-0 rounded-lg px-4 py-3.5 placeholder:text-bgray-500 placeholder:text-base"
            placeholder="Confirm Password"
            name="password_confirmation"
          />
          <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
          <button class="absolute top-4 right-4 bottom-4">
            <svg
              width="22"
              height="20"
              viewBox="0 0 22 20"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M2 1L20 19"
                stroke="#718096"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M9.58445 8.58704C9.20917 8.96205 8.99823 9.47079 8.99805 10.0013C8.99786 10.5319 9.20844 11.0408 9.58345 11.416C9.95847 11.7913 10.4672 12.0023 10.9977 12.0024C11.5283 12.0026 12.0372 11.7921 12.4125 11.417"
                stroke="#718096"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M8.363 3.36506C9.22042 3.11978 10.1082 2.9969 11 3.00006C15 3.00006 18.333 5.33306 21 10.0001C20.222 11.3611 19.388 12.5241 18.497 13.4881M16.357 15.3491C14.726 16.4491 12.942 17.0001 11 17.0001C7 17.0001 3.667 14.6671 1 10.0001C2.369 7.60506 3.913 5.82506 5.632 4.65906"
                stroke="#718096"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </button>
        </div>
        <div class="flex justify-between mb-7">
          <div class="flex items-center gap-x-3">
            <input
              type="checkbox"
              class="w-5 h-5 focus:ring-transparent rounded-md border border-bgray-300 focus:accent-success-300 text-success-300 dark:bg-transparent dark:border-darkblack-400"
              name="remember"
              id="remember"
              required
            />
            <label for="remember" class="text-bgray-600 dark:text-bgray-50 text-base"
              >By creating an account, you agreeing to our
              <span class="text-bgray-900 dark:text-white">Privacy Policy,</span> and
              <span class="text-bgray-900 dark:text-white"
                >Electronics Communication Policy</span
              >.</label
            >
          </div>
        </div>
        <button
          type="submit"
          class="py-3.5 flex items-center justify-center text-white font-bold bg-success-300 hover:bg-success-400 transition-all rounded-lg w-full"
        >
          Sign Up
        </button>
      </form>
      <!-- Form Bottom -->
      <p class="text-center text-bgray-900 dark:text-bgray-50 text-base font-medium pt-7">
        Already have an account?
        <a href="/login" class="font-semibold underline">Sign In</a>
      </p>
      <nav
        class="flex items-center justify-center flex-wrap gap-x-11 pt-24"
      >
        <a href="#" class="text-sm text-bgray-700 dark:text-bgray-50">Terms & Condition</a>
        <a href="#" class="text-sm text-bgray-700 dark:text-bgray-50">Privacy Policy</a>
        <a href="#" class="text-sm text-bgray-700 dark:text-bgray-50">Help</a>
        <a href="#" class="text-sm text-bgray-700 dark:text-bgray-50">English</a>
      </nav>
      <!-- Copyright -->
      <p class="text-bgray-600 dark:text-darkblack-300 text-center text-sm mt-6">
        &copy; 2023 Bankco. All Right Reserved.
      </p>
    </div>
</x-guest-layout>
