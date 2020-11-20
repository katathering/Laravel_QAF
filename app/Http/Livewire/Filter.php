<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;

class Filter extends Component
{
    public $search = '';

    public function render()
    {
        return view('livewire.filter', [
            'questions' => Question::where('question','LIKE', "%$this->search%")->get(),
        ]);
    }
}
