@extends('layouts.layout')

@section('style')
    <style>
        .container{
            width: 70%;
        }

        #back-to-the-questions {
            text-decoration: none;
            border: 1px solid black;
            padding: 5px 7px;
        }

        #back-to-the-questions:hover {
            background-color: black;
            color: white;
        }

    </style>
@endsection

@section('header')
    @livewireScripts
    @if (Route::has('login'))

        @auth
            @livewire('navigation-dropdown')
        @else
            <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <div class="flex-shrink-0 flex items-center">
                                <a id="logo" href="{{ route('welcome') }}" style="border: none">
                                    <img style="margin-top: 40px" src="{{asset('Logo/QALogoKlein.png')}}">
                                </a>
                            </div>
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <x-jet-nav-link href="{{ route('dashboard') }}"
                                                :active="request()->routeIs('questions.index')">
                                    {{ __('Home') }}
                                </x-jet-nav-link>
                            </div>
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <x-jet-nav-link href="{{ route('questions.create') }}"
                                                :active="request()->routeIs('questions.create')">
                                    {{ __('Create New Question') }}
                                </x-jet-nav-link>
                            </div>
                            <div class="flex pull-right" style="margin-left: 30rem">
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
                    </div>
                </div>
            </nav>
        @endauth

    @endif
@endsection
@section('content')

    <div class="container">
        <h1>Welcome to the Q&A Forum</h1>
        <h2>You have a question? Then ask!</h2>
        <h2>No matter what, feel free to join this community.</h2>
        <br>
        <br>
        <hr>
        <br>
        <p>Soooo....</p>
        <p>Login and ask what's on your mind. Or you have an answer to one of the miracoulous questions!</p>
        <p>Or just dig in and serve trough all the questions already asked.</p>
        <br>
        <p><strong>BUT!</strong> Be nice to each other!</p>
        <br>
        <div class="back">
            <a id="back-to-the-questions" href="{{route('questions.index')}}">To the Questions!</a>
        </div>
        <br>
        <img src="{{asset('Logo/QA.png')}}">
    </div>
@endsection

