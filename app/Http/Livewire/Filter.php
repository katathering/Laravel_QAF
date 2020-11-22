<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Filter extends Component
{
    public $search = '';

    public function render()
    {
        $count = Question::all()->count();
        return view('livewire.filter', [
            'questions' => Question::where('question', 'LIKE', "%$this->search%")->get(), 'count' => $count
        ]);
    }
}
