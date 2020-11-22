@extends('layouts.layout')

@section('style')
    <style>
        .container {
            width: 50%;
        }
    </style>
@endsection

@section('header')
    @livewireScripts
    @if (Route::has('login'))

        @auth
            @livewire('navigation-dropdown')
        @else
            <div class="px-4 sm:px-6 lg:px-8 not-logged-in ">
                <div class="flex pull-right">
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-jet-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                            {{ __('Login') }}
                        </x-jet-nav-link>
                    </div>

                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-jet-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                            {{ __('Register') }}
                        </x-jet-nav-link>
                    </div>
                </div>
            </div>
        @endauth

    @endif
@endsection

@section('content')

    <div class="row mt-5">
        <div class="col-lg-12 margin-tb">
            <div id="back">
                <a class="btn btn-primary-outline" href="{{ route('questions.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <h1>Your Questions</h1>

    @livewire('my-questions')
    {!! $questions->links() !!}

@endsection
