<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Album;
use App\Models\Insight;
use App\Models\Peran;
use App\Models\Negara;

use App\Helpers\Helper;

use Storage;
use Session;

class InsightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insights = Insight::all();
        return view('admin.pages.insight.view')->withInsights($insights);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $albums = Album::all();
        $perans = Peran::all();
        $negaras = Negara::all();
        return view('admin.pages.insight.add')->withAlbums($albums)->withPerans($perans)->withNegaras($negaras);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'album_id' => 'required|numeric',
            'name_anime_character' => 'required|min:3',
            'image_anime_character' => 'sometimes|image',
            'peran_id' => 'required|numeric',
            'name_orang' => 'required|min:3',
            'image_orang' => 'sometimes|image',
            'negara_id' => 'required|numeric'
        ));

        $insight = new Insight;

        $insight->album_id = $request->album_id;
        $insight->name_anime_character = $request->name_anime_character;

        # save image
        if ($request->hasFile('image_anime_character')) {
            $insight->image_anime_character = Helper::interventionUploadImage($request->file('image_anime_character'), array('width' => 34, 'height' => 45));
            /*$insight->image_anime_character = Helper::interventionUploadImage($request->file('image_anime_character'), null);*/
        } else {
            return redirect()->route('admin.home');
        }

        $insight->peran_id = $request->peran_id;
        $insight->name_orang = $request->name_orang;

        if (!$request->hasFile('image_orang')) {
            return redirect()->route('admin.home');
        } else {
            $insight->image_orang = Helper::interventionUploadImage($request->file('image_orang'), array('width' => 34, 'height' => 45));
            /*$insight->image_orang = Helper::interventionUploadImage($request->file('image_orang'), null);*/
        }

        $insight->negara_id = $request->negara_id;

        $insight->save();

        return redirect()->route('insight.index')->with('success', 'Insight was created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $insight = Insight::find($id);
        return view('admin.pages.insight.show')->withInsight($insight);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $insight = Insight::find($id);
        $albums = Album::all();
        $perans = Peran::all();
        $negaras = Negara::all();

        $albs = array();
        $perns = array();
        $ngrs = array();

        foreach ($albums as $album) {
            $albs[$album->id] = $album->name;
        }
        foreach ($perans as $peran) {
            $perns[$peran->id] = $peran->name;
        }
        foreach ($negaras as $negara) {
            $ngrs[$negara->id] = $negara->name;
        }

        return view('admin.pages.insight.edit')->withInsight($insight)->withAlbums($albs)->withPerans($perns)->withNegaras($ngrs);
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
        $this->validate($request, array(
            'album_id' => 'required|numeric',
            'name_anime_character' => 'required|min:3',
            // 'image_anime_character' => 'sometimes|image',
            'peran_id' => 'required|numeric',
            'name_orang' => 'required|min:3',
            // 'image_orang' => 'sometimes|image',
            'negara_id' => 'required|numeric'
        ));

        $insight = Insight::find($id);

        $insight->album_id = $request->album_id;
        $insight->name_anime_character = $request->name_anime_character;

        # save image
        if ($request->hasFile('image_anime_character')) {
            $image_path = str_replace(url(), '', $insight->image_anime_character);

            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $insight->image_anime_character = Helper::interventionUploadImage($request->file('image_anime_character'), array('width' => 34, 'height' => 45));
            /*$insight->image_anime_character = Helper::interventionUploadImage($request->file('image_anime_character'), null);*/
            // Storage::delete(Helper::getNameFileFromUrl($insight->old_image_anime_character));
        }

        $insight->peran_id = $request->peran_id;
        $insight->name_orang = $request->name_orang;

        if ($request->hasFile('image_orang')) {
            $image_path = str_replace(url(), '', $insight->image_orang);

            if (file_exists($image_path)) {
                unlink($image_path);
            }
            
            $insight->image_orang = Helper::interventionUploadImage($request->file('image_orang'), array('width' => 34, 'height' => 45));
            /*$insight->image_orang = Helper::interventionUploadImage($request->file('image_orang'), null);*/
            // Storage::delete(Helper::getNameFileFromUrl($insight->old_image_orang));
        }

        $insight->negara_id = $request->negara_id;

        $insight->save();

        return redirect()->route('insight.index')->with('success', 'Insight was updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $insight = Insight::find($id);
        // Storage::delete(Helper::getNameFileFromUrl($insight->image_anime_character));
        $image_path = str_replace(url(), '', $insight->image_anime_character);

        if (file_exists($image_path)) {
            unlink($image_path);
        }
        // Storage::delete(Helper::getNameFileFromUrl($insight->image_orang));
        $image_path2 = str_replace(url(), '', $insight->image_orang);

        if (file_exists($image_path2)) {
            unlink($image_path2);
        }

        $insight->delete();
        return redirect()->route('insight.index')->with('success', 'Insight was deleted successfully!');
    }
}
