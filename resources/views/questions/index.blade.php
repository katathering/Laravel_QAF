@extends('questions.layout')

@section('content')
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

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Question</th>
            <th>Content</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($questions as $question)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $question->question }}</td>
                <td>{{ $question->content }}</td>
                <td>
                    <form action="{{ route('questions.destroy',$question->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('questions.show',$question->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('questions.edit',$question->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $questions->links() !!}

@endsection
