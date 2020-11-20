<div>
    <div>
        <input wire:model="search" type="text" placeholder="Search users..."/>


        <table class="table table-bordered">
            <tr>
                <th>{{ count($questions) === 1 ? count($questions).' Question' : count($questions).' Questions' }}</th>
            </tr>
            @foreach ($questions->reverse() as $question)
                <tr>
                    <td><a class="btn btn-info" href="{{ route('questions.show',$question->id) }}">{{ $question->question }}</a> <br>
                        <small>asked {{ $question->created_at->diffForHumans() }}</small><br>
                        <small>{{ count(\App\Models\Answer::where('question_id',  $question->id)->get()) === 1 ? count(\App\Models\Answer::where('question_id',  $question->id)->get()).' Answer' : count(\App\Models\Answer::where('question_id',  $question->id)->get()).' Answers' }}</small>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>
</div>
