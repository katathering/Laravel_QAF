@extends('questions.layout')

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
                        </div>
                    </div>
                </div>
            </nav>
        @endauth

    @endif
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>
                    @if(count($questions) === 0)
                        What a surprise? The World has no questions.
                    @elseif(count($questions) <= 3)
                        Hooray! Some questioner was here
                    @else
                        Look at all these questions!
                    @endif
                </h1>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @livewire('filter')

    <div class="space"></div>
@endsection
