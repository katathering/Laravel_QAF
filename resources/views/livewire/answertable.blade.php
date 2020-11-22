<div>
    @if(Auth::user())
        <form wire:submit.prevent="store({{$question_id}})">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>You have the answer? Then add it!</strong>
                        <textarea id="answer" class="form-control" style="height:150px" name="answer"
                                  wire:model="answer" placeholder="Your Answer"></textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button class="btn btn-primary" id="newAnswer" type="submit">Add Answer</button>
                </div>
            </div>
        </form>
    @else
        <p>You have the right answer? Then login and share your knowledge!</p>
    @endif
    <div id="div">
        <table class="table table-bordered">
            <tr>
                <th>{{ count($answers) === 1 ? count($answers).' Answer' : count($answers).' Answers' }}</th>
            </tr>
            @foreach ($answers->reverse() as $answer)
                <tr>
                    <td>{{ $answer->answer }}<br>
                        <small>answered <strong>{{ $answer->created_at->diffForHumans() }}</strong> by
                            <strong>{{ (\App\Models\User::where('id', $answer->user_id)->pluck('name')->first()) ?? 'the awesome creator' }}</strong></small>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="space"></div>
</div>

