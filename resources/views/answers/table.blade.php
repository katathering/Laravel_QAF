<div id="div">
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Answer</th>
            {{--<th width="280px">Action</th>--}}
        </tr>
        @foreach ($answers->reverse() as $answer)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $answer->answer }}</td>
                {{--   <td>
                       <form action="{{ route('answers.destroy',$answer->id) }}" method="POST">

                           <a class="btn btn-info" href="{{ route('answers.show',$answer->id) }}">Show</a>

                           <a class="btn btn-primary" href="{{ route('answers.edit',$answer->id) }}">Edit</a>

                           @csrf
                           @method('DELETE')

                           <button type="submit" class="btn btn-danger">Delete</button>
                       </form>
                   </td>--}}
            </tr>
        @endforeach
    </table>
</div>
