<div>
    <div>
        <input wire:model="search" type="text" id="search" placeholder="Search questions..."/>


        <table class="filter-table">
            <tr>
                <th>{{ $count === 1 ? $count.' Question' : $count.' Questions' }}</th>
            </tr>
            @foreach ($questions->reverse() as $question)
                <tr>
                    <td>
                        <div class="a-div">
                            <form action="{{ route('questions.destroy',$question->id) }}" method="POST">
                                <a class="to-the-question" href="{{ route('questions.show',$question->id) }}">{{ $question->question }}</a>
                                <a class="btn btn-primary" href="{{ route('questions.edit',$question->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
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
