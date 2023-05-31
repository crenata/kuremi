<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

use App\Models\Album;
use App\Models\Day;
use App\Models\Status;
use App\Models\Musim;
use App\Models\Genre;
use App\Models\Type;

use App\Helpers\Helper;

use Session;
use Storage;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        # Display all of album anime
        $albums = Album::all();
        return view('admin.pages.album.view')->withAlbums($albums);
    }

    public function userIndex() {
        // $ongoings = Album::where('status_id', 1)->orderBy('id', 'desc')->paginate(7);
        // $completes = Album::where('status_id', 2)->orderBy('id', 'desc')->paginate(7);
        // return view('pages.home')->withOngoings($ongoings)->withCompletes($completes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = Status::all();
        $musims = Musim::all();
        $genres = Genre::all();
        $types = Type::all();
        $days = Day::all();
        return view('admin.pages.album.add')->withStatuses($statuses)->withMusims($musims)->withGenres($genres)->withTypes($types)->withDays($days);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        # validate data
        $this->validate($request, array(
            'name' => 'required|min:5',
            'sinopsis' => 'required|min:10',
            'image_default' => 'sometimes|image',
            'image_banner' => 'sometimes|image',
            'durasi' => 'required',
            'trailer' => '',
            'release' => 'required',
            'produser' => 'required',
            'rating' => 'required',
            'link_mal' => 'required',
            'credit' => 'required',
            'status_id' => 'required|numeric',
            'musim_id' => 'required|numeric',
            'day_id' => 'required|numeric',
            'keyword' => 'required|min:5'
        ));

        # store database
        $album = new Album;

        $album->name = $request->name;
        $album->sinopsis = $request->sinopsis;
        $album->slug = str_slug($request->name, '-');

        # save image
        if ($request->hasFile('image_default') && $request->hasFile('image_banner')) {
            $album->image_default = Helper::interventionUploadImage($request->file('image_default'), array('width' => 160, 'height' => 220));
            $album->image_banner = Helper::interventionUploadImage($request->file('image_banner'), null);
        } else {
            return redirect()->back()->with('errors', 'Please insert Image!');
        }

        $album->durasi = $request->durasi;

        if ($request->hasFile('trailer')) {
            $album->trailer = Helper::uploadFile($request->file('trailer'), 'trailer');
        }

        $album->release = $request->release;
        $album->produser = $request->produser;
        $album->rating = $request->rating;
        $album->link_mal = $request->link_mal;
        $album->credit = $request->credit;
        $album->status_id = $request->status_id;
        $album->musim_id = $request->musim_id;
        $album->day_id = $request->day_id;
        $album->is_approved = $request->has('is_approved') ? $request->is_approved : 0;
        $album->uploaded_by = 1;
        $album->keyword = $request->keyword;

        $album->save();

        $album->genres()->sync($request->genres, false);
        $album->types()->sync($request->types, false);

        // Session::flash('success', 'Album was created successfully!');

        # return to another page
        return redirect()->route('album.index')->with('success', 'Album was created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::find($id);
        return view('admin.pages.album.show')->withAlbum($album);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Album::find($id);
        $statuses = Status::all();
        $musims = Musim::all();
        $genres = Genre::all();
        $types = Type::all();
        $days = Day::all();

        $stats = array();
        $musms = array();
        $gens = array();
        $typs = array();
        $dys = array();

        foreach ($statuses as $status) {
            $stats[$status->id] = $status->name;
        }
        foreach ($musims as $musim) {
            $musms[$musim->id] = $musim->name;
        }
        foreach ($genres as $genre) {
            $gens[$genre->id] = $genre->name;
        }
        foreach ($types as $type) {
            $typs[$type->id] = $type->name;
        }
        foreach ($days as $day) {
            $dys[$day->id] = $day->name;
        }

        return view('admin.pages.album.edit')->withAlbum($album)->withStatuses($stats)->withMusims($musms)->withGenres($gens)->withTypes($typs)->withDays($dys);
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
        # validate data
        $this->validate($request, array(
            'name' => 'required|min:5',
            'sinopsis' => 'required|min:10',
            // 'image_default' => 'sometimes|image',
            // 'image_banner' => 'sometimes|image',
            'durasi' => 'required',
            'trailer' => '',
            'release' => 'required',
            'produser' => 'required',
            'rating' => 'required',
            'link_mal' => 'required',
            'credit' => 'required',
            'status_id' => 'required|integer',
            'musim_id' => 'required|integer',
            'day_id' => 'required|integer',
            'keyword' => 'required'
        ));

        $album = Album::find($id);

        $album->name = $request->name;
        $album->sinopsis = $request->sinopsis;
        $album->slug = str_slug($request->name, '-');

        # save image
        if ($request->hasFile('image_default')) {
            $image_path = str_replace(url(), '', $album->image_default);

            if (file_exists($image_path)) {
                unlink($image_path);
            }
            
            $album->image_default = Helper::interventionUploadImage($request->file('image_default'), array('width' => 160, 'height' => 220));
            # delete old foto
            // Storage::delete(Helper::getNameFileFromUrl($old_image_default));
        } else if ($request->hasFile('image_banner')) {
            $image_path = str_replace(url(), '', $album->image_banner);

            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $album->image_banner = Helper::interventionUploadImage($request->file('image_banner'), null);
            # delete old foto
            // Storage::delete(Helper::getNameFileFromUrl($old_image_banner));
        }

        $album->durasi = $request->durasi;

        if ($request->hasFile('trailer')) {
            $album->trailer = Helper::uploadFile($request->file('trailer'), 'trailer');
        }

        $album->release = $request->release;
        $album->produser = $request->produser;
        $album->rating = $request->rating;
        $album->link_mal = $request->link_mal;
        $album->credit = $request->credit;
        $album->status_id = $request->status_id;
        $album->musim_id = $request->musim_id;
        $album->day_id = $request->day_id;
        $album->is_approved = $request->has('is_approved') ? $request->is_approved : 0;
        $album->uploaded_by = 1;
        $album->keyword = $request->keyword;

        $album->save();

        if (isset($request->genres)) {
            $album->genres()->sync($request->genres);
        } else {
            $album->genres()->sync(array());
        }

        if (isset($request->types)) {
            $album->types()->sync($request->types);
        } else {
            $album->types()->sync(array());
        }

        // Session::flash('success', 'Album was created successfully!');

        # return to another page
        return redirect()->route('album.index')->with('success', 'Album was updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::find($id);
        $album->genres()->detach();
        $album->types()->detach();
        // Storage::delete(Helper::getNameFileFromUrl($album->image_default));
        $image_path = str_replace(url(), '', $album->image_default);

        if (file_exists($image_path)) {
            unlink($image_path);
        }
        // Storage::delete(Helper::getNameFileFromUrl($album->image_banner));
        $image_path2 = str_replace(url(), '', $album->image_banner);

        if (file_exists($image_path2)) {
            unlink($image_path2);
        }
        $album->delete();
        return redirect()->route('album.index')->with('success', 'Album was deleted successfully!');
    }

    public function albumApprove(Request $request) {
        $album = Album::find($request->id);
        $album->is_approved = $request->approve_status;
        $album->save();

        return back()->with('success', $request->message . 'successfully!');
    }
}
