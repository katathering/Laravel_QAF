<?php

namespace App\Http\Livewire;

use App\Models\Answer;
use Illuminate\Http\Request;
use Livewire\Component;

class Answertable extends Component
{
    public $answer;

    public function render()
    {
        $answers = Answer::all();
        return view('livewire.answertable', compact('answers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store()
    {
        $validatedData = $this->validate([
            'answer' => 'required',
        ]);
        Answer::create($validatedData);
    }
}
