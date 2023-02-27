<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <link href="{{ URL::asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/app.css') }}" rel="stylesheet">

    {{--  template css  --}}
    <link href="{{ URL::asset('assets/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/aos.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/bootstrap-rtl.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets\css\bootstrap.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/custom-animation.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/fonts.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/framework.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/menu.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets\fonts\gilroy\fonts.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets\fonts\gordita\stylesheet.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets\fonts\font-awesome\css\font-awesome.min.css') }}" rel="stylesheet">
    <div class="main-page-wrapper p0">
        <!-- ===================================================
        Loading Transition
    ==================================================== -->
        <section>
            <div id="preloader">
                <div id="ctn-preloader" class="ctn-preloader">
                    <div class="animation-preloader">
                        <div class="spinner"></div>
                        <div class="txt-loading">
                            <span data-text-preloader="N" class="letters-loading">
                                N
                            </span>
                            <span data-text-preloader="A" class="letters-loading">
                                A
                            </span>
                            <span data-text-preloader="W" class="letters-loading">
                                W
                            </span>
                            <span data-text-preloader="A" class="letters-loading">
                                A
                            </span>
                            <span data-text-preloader="B" class="letters-loading">
                                B
                            </span>
                            <span data-text-preloader="E" class="letters-loading">
                                E
                            </span>
                            <span data-text-preloader="D" class="letters-loading">
                                D
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!--
    =============================================
        Sign In
    ==============================================
    -->
        <div class="user-data-page clearfix d-lg-flex">
            <div class="illustration-wrapper d-flex align-items-center justify-content-between flex-column">
                <h3 class="font-rubik">Want your best managment <br>software? <a href="sign-up.html">sign up</a></h3>
                <div class="illustration-holder">
                    <img src="{{ URL::asset('assets/images/assets/ils_08.svg') }}" alt="" class="illustration">
                    
                </div>
            </div>

            <div class="form-wrapper">
                <div class="d-flex justify-content-between">
                    <div class="logo">
                        <a href="index.html">
                            <img src="{{ URL::asset('assets/images/assets/deski_01.svg') }}" alt="">
                        </a>
                    </div>
                </div>
                <form method="POST" action="{{ route('login') }}" class="user-data-form mt-80 md-mt-40">
                    @csrf

                    <!-- Email Address -->
                    <div class="input-group-meta mb-80 sm-mb-70">
                        <x-input-label for="email" :value="__('البريد')" />
                        <x-text-input id="email" class="block mt-1 w-full form-control" type="email"
                            name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="input-group-meta mb-80 sm-mb-70">
                        <x-input-label for="password" :value="__('كلمة المرور')" />

                        <x-text-input id="password" class="block mt-1 w-full form-control" type="password"
                            name="password" required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                name="remember">
                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-primary-button class="ml-3 btn btn-primary">
                            {{ __('تسجيل الدخول') }}
                        </x-primary-button>
                    </div>
                </form>


            </div>
        </div>



    </div>





</x-guest-layout>
