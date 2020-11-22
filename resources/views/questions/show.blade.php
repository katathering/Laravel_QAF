@extends('layouts.layout')


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
    <div class="row mt-5">
        <div class="col-lg-12 margin-tb">
            <div id="back">
                <a class="btn btn-primary-outline" href="{{ route('questions.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8">
            <div class="form-group">
                <h1 style="font-size: 40pt "><strong>{{ $question->question }}</strong></h1>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4">
            <div style="padding-top: 2.5rem">
                @if(Auth::user() && $question->user_id == Auth::user()->id)
                    <form action="{{ route('questions.destroy',$question->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('questions.edit', $question->id) }}"> Edit</a>
                        <button type="submit" id="delete" class="btn btn-danger show_confirm">Delete</button>
                        @csrf
                        @method('DELETE')
                    </form>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <p>{{ $question->content }}</p>
            </div>
            @if($question->image_source != NULL)
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <img style="max-height: 18rem" src="{{ asset('images/'.$question->image_source)}}"
                         alt="image not found">
                </div>
            @endif
        </div>
    </div>
    <br>
    <br>
    <hr style="margin-bottom: 3rem; height: 2px; background-color: black">

    <p id="AnswerAdded" style="color:green;"></p>

    @livewire('answertable', ['question_id' => $question->id])

@endsection
@section('script')
    <script>
        $('#newAnswer').on('click', function () {
            $('#AnswerAdded').html('Good job! You added an Answer.');
        })

        $('.show_confirm').click(function (e) {
            if (!confirm('Are you sure you want to delete your miraculous question? If so, all the answers will be gone!')) {
                e.preventDefault();
            }
        });

    </script>
@endsection



