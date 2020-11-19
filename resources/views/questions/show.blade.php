@extends('questions.layout')

@section('content')
    @livewireScripts

    <button type="button" id="button">Set background color</button>
    <button type="button" id="button2">Alert me</button>



    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show question</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('questions.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{ $question->question }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Teaser:</strong>
                {{ $question->content }}
            </div>
        </div>
    </div>

   {{-- <form>
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Your Answer:</strong>
                    <textarea id="answer" class="form-control" style="height:150px" name="answer" placeholder="Your Answer"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button class="btn btn-primary" id="newAnswer" type="button" onclick="getMessage()">Add Answer</button>
            </div>
        </div>
    </form>--}}

    <livewire:answertable />

{{--    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{ $answer->answer }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Teaser:</strong>
                {{ $answer->content }}
            </div>
        </div>
    </div>--}}

    <p id="new"></p>
    <div id="table-container">
    </div>
    {{--<div id="div">
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Answer</th>
            --}}{{--<th width="280px">Action</th>--}}{{--
        </tr>
    @foreach ($answers->reverse() as $answer)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $answer->answer }}</td>
         --}}{{--   <td>
                <form action="{{ route('answers.destroy',$answer->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('answers.show',$answer->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('answers.edit',$answer->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>--}}{{--
        </tr>
    @endforeach
    </table>
    </div>--}}


@endsection

@section('script')
<script>

    var button = document.getElementById('button');
    button.addEventListener("click", function () {
        document.body.style.backgroundColor = "red";
    });

    $('#button2').on('click', function() {
        alert( "Handler for .click() called." );
        var name = $('#answer').val();
        console.log(name);
    })


   /*function getMessage() {
       var answer = $('#answer').val();
       var newAnswer = $('#new');
       var div= $('#table-container').html();
        $.ajax({
            type    : "POST",
            url    : '/saveAnswer',
            data    : {
                 answer: answer,
                _token: '{{csrf_token()}}'
            },
            success:function(data) {
               /!*alert(data);*!/
                newAnswer.html('Eine neue Antwort')
            },
            error: function() {
                alert('nein') }
        })*/



</script>
@endsection


