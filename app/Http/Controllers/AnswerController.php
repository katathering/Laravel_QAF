<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('answers.create');
    }

}
