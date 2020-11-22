<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Question;

class MyQuestions extends Component
{

   public $search = '';

   public function render()
       {
           $user = Auth::user();
           $questions = Question::where('user_id', $user->id)
                                ->where('question', 'LIKE', "%$this->search%")->get();
           $count = Question::where('user_id', $user->id)->count();

            return view('livewire.my-questions', [
            'questions' => $questions, 'count' => $count
            ]);
       }
}
