<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

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


        $file = $request->file('image');
        if ($file){
            $file_name = $this->prepareImage($file);
            $image = ['image_source' => $file_name];
        }else{
            $image = ['image_source' => NULL];
        }


        $userid = Auth::id();
        $user_array = ['user_id' => $userid];
        $newQuestion = array_merge($request->all(), $user_array, $image);

        $new = Question::create($newQuestion);

        if ($file && $new){
            $file->move(public_path('images'), $file_name);
        }

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
        return view('questions.show',compact('question'))
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
       $file_name = $question->image_source;
        if ($file_name != NULL) {
            unlink('images/' . $file_name);
        }


        $question->delete();

        return redirect()->route('questions.index')
            ->with('success','Question deleted successfully');
    }

    public function myQuestions(){
        $user = Auth::user();
        $questions = Question::where('user_id', $user->id)->paginate(5);

        return view('questions.myQuestions',compact('questions'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function prepareImage($file){
        $original_filename = $file->getClientOriginalName();
        $filename = pathinfo($original_filename, PATHINFO_FILENAME);
        $filename = preg_replace("/\s+/", '-', $filename);
        $original_extension = $file->getClientOriginalExtension();

        // Create unique file name
        $final_filename = $filename.'_'.random_int(100, 1000000).'.'.$original_extension;

        return $final_filename;
    }
}
