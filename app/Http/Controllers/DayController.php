<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Day;
use Session;

class DayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $days = Day::all();
        return view('admin.pages.day.view')->withDays($days);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.day.add');
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

        $day = new Day;
        $day->name = $request->name;
        $day->slug = str_slug($request->name, '-');
        $day->save();

        return redirect()->route('day.index')->with('success', 'Day was created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $day = Day::find($id);
        return view('admin.pages.day.show')->withDay($day);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $day = Day::find($id);
        return view('admin.pages.day.edit')->withDay($day);
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
        $day = Day::find($id);
        $this->validate($request, array('name' => 'required'));
        $day->name = $request->name;
        $day->slug = str_slug($request->name, '-');
        $day->save();
        return redirect()->route('day.index')->with('success', 'Day successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $day = Day::find($id);
        $day->albums()->update(['day_id' => null]);
        $day->delete();
        return redirect()->route('day.index')->with('success', 'Day was deleted successfully!');
    }
}
