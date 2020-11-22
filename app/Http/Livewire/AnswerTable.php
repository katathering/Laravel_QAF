<?php

namespace App\Http\Livewire;

use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AnswerTable extends Component
{
    public $answer;
    public $question_id;
    public $search = '';

    public function render()
    {
        $answers = Answer::where('question_id', $this->question_id)->get();
        return view('livewire.answertable', compact('answers'));
    }

    /**
     * Store a newly created resource in storage.
     * @param $question_id
     */
    public function store($question_id)
    {
        $validatedData = $this->validate([
            'answer' => 'required'
        ]);
        $array = ['question_id' => $question_id];
        $user_array = ['user_id' => Auth::id()];
        $newAnswer = array_merge($validatedData, $array, $user_array);

        Answer::create($newAnswer);
    }
}
