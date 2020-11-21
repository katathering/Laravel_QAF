<x-guest-layout>

    <x-slot name="logo">
    </x-slot>

    <div style="background-color: #e6e6e6; width: 25%;margin: 10rem auto; padding: 2px 0">
        <div class="pre-login" style="background-color: #e6e6e6; margin: 3rem 3rem; ">

            <x-jet-validation-errors class=""/>

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <h1>Welcome</h1>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mt-4">
                    {{--<x-jet-label class="email-login" for="email" value="{{ __('Email') }}" /><br>
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />--}}
                    <strong>Email</strong><br>
                    <input id="email" style="width: 100%" type="email" class="form-control" name="email"
                           :value="old('email')" required autofocus/>
                </div>

                <div class="mt-4">
                    {{--
                                    <x-jet-label for="password" value="{{ __('Password') }}" /><br>
                    --}}
                    <strong>Password</strong>
                    <input id="password" style="width: 100%" type="password" class="form-control" name="password"
                           required autocomplete="current-password"/>
                    {{--
                                    <x-jet-input id="password" class="block mt-1" type="password" name="password" required autocomplete="current-password"/>
                    --}}
                </div>

                {{--<div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>--}}


                {{--   @if (Route::has('password.request'))
                       <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                           {{ __('Forgot your password?') }}
                       </a>
                   @endif
   --}}
                <button class="btn btn-primary btn-lg mt-4">
                    {{ __('Login') }}
                </button>


            </form>
        </div>
    </div>

</x-guest-layout>
