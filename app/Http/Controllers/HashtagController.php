<?php

namespace App\Http\Controllers;

use App\Models\Hashtag;
use Illuminate\Http\Request;

class HashtagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $hashtags = Hashtag::latest()->paginate(5);

        return view('hashtags.index',compact('hashtags'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hashtags.create');
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

        Hashtag::create($request->all());

        return redirect()->route('hashtags.index')
            ->with('success','Hashtag created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hashtag  $hashtag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Hashtag $hashtag)
    {
        return view('hashtags.show',compact('hashtag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hashtag  $hashtag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Hashtag $hashtag)
    {
        return view('hashtags.edit',compact('hashtag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hashtag  $hashtag
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Hashtag $hashtag)
    {
        /*$request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);*/

        $hashtag->update($request->all());

        return redirect()->route('hashtags.index')
            ->with('success','Hashtag updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hashtag  $hashtag
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Hashtag $hashtag)
    {
        $hashtag->delete();

        return redirect()->route('hashtags.index')
            ->with('success','Hashtag deleted successfully');
    }
}
