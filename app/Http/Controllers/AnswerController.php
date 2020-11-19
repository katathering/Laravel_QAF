<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {

        $answers = Answer::latest()->paginate(5);

        return view('answers.index',compact('answers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function sth(Request $request)
    {
        $msg =  "This is a simple message.";
        /*return response()->json(array('msg'=> $msg), 200);*/
        return $msg;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('answers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $question_index
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Answer::create($request->all());
        $msg =  "This is a simple message.";
        /*return response()->json(array('msg'=> $msg), 200);*/
        exit(200);

       /* return redirect()->route('answers.index')
            ->with('success','Answer created successfully.');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Answer $answer)
    {
        return view('answers.show',compact('answer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Answer $answer)
    {
        return view('answers.edit',compact('answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Answer $answer)
    {
        /*$request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);*/

        $answer->update($request->all());

        return redirect()->route('answers.index')
            ->with('success','Answer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Answer $answer)
    {
        $answer->delete();

        return redirect()->route('answers.index')
            ->with('success','Answer deleted successfully');
    }
}
