<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Negara;
use Session;

class NegaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $negaras = Negara::all();
        return view('admin.pages.negara.view')->withNegaras($negaras);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.negara.add');
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

        $negara = new Negara;
        $negara->name = $request->name;
        $negara->slug = str_slug($request->name, '-');
        $negara->save();

        return redirect()->route('negara.index')->with('success', 'Negara was created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $negara = Negara::find($id);
        return view('admin.pages.negara.show')->withNegara($negara);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $negara = Negara::find($id);
        return view('admin.pages.negara.edit')->withNegara($negara);
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
        $negara = Negara::find($id);
        $this->validate($request, array('name' => 'required'));
        $negara->name = $request->name;
        $negara->slug = str_slug($request->name, '-');
        $negara->save();
        return redirect()->route('negara.index')->with('success', 'Negara successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $negara = Negara::find($id);
        $negara->delete();
        return redirect()->route('negara.index')->with('success', 'Negara was deleted successfully!');
    }
}
