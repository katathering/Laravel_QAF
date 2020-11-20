<?php

namespace App\Http\Livewire;

use App\Models\Answer;
use Illuminate\Http\Request;
use Livewire\Component;

class Answertable extends Component
{
    public $answer;
    public $question_id;

    public function render()
    {
        $answers = Answer::all();
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
        $etwas = array_merge($validatedData, $array);

        Answer::create($etwas);
    }
}
