@extends('answers.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example from scratch - ItSolutionStuff.com</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('answers.create') }}"> Create New Answer</a>
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
            <th>Answer</th>
            <th>Content</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($answers as $answer)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $answer->answer }}</td>
                <td>{{ $answer->content }}</td>
                <td>
                    <form action="{{ route('answers.destroy',$answer->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('answers.show',$answer->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('answers.edit',$answer->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $answers->links() !!}

@endsection
