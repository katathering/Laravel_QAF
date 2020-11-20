<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
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
     * @return Factory|View
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
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
     * @param Question $question
     * @return Factory|View
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
     * @param Question $question
     * @return Factory|View
     */
    public function edit(Question $question)
    {
        return view('questions.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Question $question
     * @return RedirectResponse
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
     * @param Question $question
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('questions.index')
            ->with('success','Question deleted successfully');
    }
}
