<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peran;
use Session;

class PeranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perans = Peran::all();
        return view('admin.pages.peran.view')->withPerans($perans);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.peran.add');
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

        $peran = new Peran;
        $peran->name = $request->name;
        $peran->slug = str_slug($request->name, '-');
        $peran->save();

        return redirect()->route('peran.index')->with('success', 'Peran was created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peran = Peran::find($id);
        return view('admin.pages.peran.show')->withPeran($peran);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peran = Peran::find($id);
        return view('admin.pages.peran.edit')->withPeran($peran);
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
        $peran = Peran::find($id);
        $this->validate($request, array('name' => 'required'));
        $peran->name = $request->name;
        $peran->slug = str_slug($request->name, '-');
        $peran->save();
        return redirect()->route('peran.index')->with('success', 'Peran successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peran = Peran::find($id);
        $peran->delete();
        return redirect()->route('peran.index')->with('success', 'Peran was deleted successfully!');
    }
}
