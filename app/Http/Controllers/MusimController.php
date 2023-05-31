<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musim;
use Session;

class MusimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musims = Musim::all();
        return view('admin.pages.musim.view')->withMusims($musims);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.musim.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array('name' => 'required'));

        $musim = new Musim;
        $musim->name = $request->name;
        $musim->slug = str_slug($request->name, '-');
        $musim->save();

        return redirect()->route('musim.index')->with('success', 'Musim was created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $musim = Musim::find($id);
        return view('admin.pages.musim.show')->withMusim($musim);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $musim = Musim::find($id);
        return view('admin.pages.musim.edit')->withMusim($musim);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $musim = Musim::find($id);
        $this->validate($request, array('name' => 'required'));
        $musim->name = $request->name;
        $musim->slug = str_slug($request->name, '-');
        $musim->save();
        return redirect()->route('musim.index')->with('success', 'Musim successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $musim = Musim::find($id);
        $musim->albums()->update(['musim_id' => null]);
        $musim->delete();
        return redirect()->route('musim.index')->with('success', 'Musim was deleted successfully!');
    }
}
