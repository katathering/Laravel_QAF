@extends('questions.layout')

@section('head')
    <style>
        .container{
            max-width: 50%!important;
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
                    <div style="width: 70%" class="m-auto">
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline mr-5">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-10 text-sm text-gray-700 underline mr-5">Register</a>
                    @endif
                    </div>
                </div>
            @endauth

    @endif
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>
                    @if(count($questions) === 0)
                        What a surprise? The World has no Questions.
                    @elseif(count($questions) <= 3)
                        Hooray! Some Questioner were here
                    @else
                        Look at all these Questions!
                    @endif
                </h1>
            </div>
            <div class="pull-right">
                <a class="btn btn-outline-info mb-3" href="{{ route('questions.create') }}"> Create New Question</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @livewire('filter')


@endsection
