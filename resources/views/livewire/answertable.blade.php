<div>
    <h1>{{$question_id}}</h1>
    <form wire:submit.prevent="store({{$question_id}})">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Your Answer:</strong>
                    <textarea id="answer" class="form-control" style="height:150px" name="answer" wire:model="answer" placeholder="Your Answer"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button class="btn btn-primary" id="newAnswer" type="submit">Add Answer</button>
            </div>
        </div>
    </form>
    <div id="div">
        <table class="table table-bordered">
            <tr>
                <th>{{ count($answers) === 1 ? count($answers).' Answer' : count($answers).' Answers' }}</th>
                {{--<th width="280px">Action</th>--}}
            </tr>
            @foreach ($answers->reverse() as $answer)
                <tr>
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
</div>
