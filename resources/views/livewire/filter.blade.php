<div>
    <div>
        <input wire:model="search" type="text" id="search" placeholder="Search questions..."/>


        <table class="filter-table">
            <tr>
                <th>{{ count($questions) === 1 ? count($questions).' Question' : count($questions).' Questions' }}</th>
            </tr>
            @foreach ($questions->reverse() as $question)
                <tr>
                    <td>
                        <div class="a-div">
                        <a class="" href="{{ route('questions.show',$question->id) }}">{{ $question->question }}</a> <br>
                        </div>
                        <small>asked {{ $question->created_at->diffForHumans() }}</small><br>
                        <small>{{ count(\App\Models\Answer::where('question_id',  $question->id)->get()) === 1 ? count(\App\Models\Answer::where('question_id',  $question->id)->get()).' Answer' : count(\App\Models\Answer::where('question_id',  $question->id)->get()).' Answers' }}</small>
                        <br><br><hr>
                    </td>

                </tr>

            @endforeach
        </table>

    </div>
</div>
