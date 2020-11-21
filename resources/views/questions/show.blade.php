@extends('questions.layout')

@section('header')
    @livewireScripts
    @if (Route::has('login'))

        @auth
            @livewire('navigation-dropdown')
        @else
            <div class="px-4 sm:px-6 lg:px-8 not-logged-in">
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-10 text-sm text-gray-700 underline ">Register</a>
                @endif
            </div>
        @endauth

    @endif
@endsection

@section('content')


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a id="back" class="btn btn-primary" href="{{ route('questions.index') }}"> Back</a>
            </div>
            <div class="pull-right">
                @if(Auth::user() && $question->user_id == Auth::user()->id)
                    <form action="{{ route('questions.destroy',$question->id) }}" method="POST">
                      <a class="btn btn-primary" href="{{ route('questions.edit', $question->id) }}"> Edit</a>
                      <button type="submit" class="btn btn-danger">Delete</button>
                        @csrf
                        @method('DELETE')
                    </form>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <h1 style="font-size: 40pt "><strong>{{ $question->question }}</strong></h1>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <p>{{ $question->content }}</p>
            </div>
            @if($question->image_source != NULL)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <img style="max-height: 20rem" src="{{ asset('images/'.$question->image_source)}}">
            </div>
            @endif
        </div>
    </div>

    <p id="AnswerAdded"></p>

    @livewire('answertable', ['question_id' => $question->id])




@endsection
@section('script')
    <script>
        $('#newAnswer').on('click', function(){
            $('#AnswerAdded').html('Good job! You added an Answer. May it help the questioner!');
        })
    </script>
@endsection



