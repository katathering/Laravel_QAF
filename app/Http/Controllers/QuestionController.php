<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $questions = Question::latest()->paginate(5);

        return view('questions.index',compact('questions'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        /*$request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);*/

        Question::create($request->all());

        return redirect()->route('questions.index')
            ->with('success','Question created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Question $question
     * @param \App\Models\Answer $answer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Question $question)
    {
        $answers = Answer::all();

        return view('questions.show',compact('question', 'answers'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Question $question)
    {
        return view('questions.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Question $question)
    {
        /*$request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);*/

        $question->update($request->all());

        return redirect()->route('questions.index')
            ->with('success','Question updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('questions.index')
            ->with('success','Question deleted successfully');
    }
}
