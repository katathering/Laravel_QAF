@extends('questions.layout')

@section('content')
    @livewireScripts

    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                @livewire('navigation-dropdown')
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif
{{--
    @livewire('navigation-dropdown')
--}}
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example from scratch - ItSolutionStuff.com</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('questions.create') }}"> Create New Question</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

 {{--   <table class="table table-bordered">
        <tr>
            <th>{{ count($questions) === 1 ? count($questions).' Question' : count($questions).' Questions' }}</th>
        </tr>
        @foreach ($questions as $question)
            <tr>
                <td><a class="btn btn-info" href="{{ route('questions.show',$question->id) }}">{{ $question->question }}</a> <br>
                    <small>asked {{ $question->created_at->diffForHumans() }}</small><br>
                    <small>{{ count(\App\Models\Answer::where('question_id',  $question->id)->get()) === 1 ? count(\App\Models\Answer::where('question_id',  $question->id)->get()).' Answer' : count(\App\Models\Answer::where('question_id',  $question->id)->get()).' Answers' }}</small>
                </td>
            </tr>
        @endforeach
    </table>--}}

    @livewire('filter')

    {!! $questions->links() !!}

@endsection
