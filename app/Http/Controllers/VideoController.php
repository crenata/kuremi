<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Album;
use App\Models\Musim;

use App\Helpers\Helper;

use Session;
use Storage;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::all();
        return view('admin.pages.video.view')->withVideos($videos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $albums = Album::all();
        return view('admin.pages.video.add')->withAlbums($albums);
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
            'name' => 'required|min:2',
            'subtitle' => 'sometimes|file'
        ));

        $video = new Video;

        $video->album_id = $request->album_id;
        $video->name = $request->name;
        $video->slug = str_slug($request->name, '-');

        if ($request->hasFile('subtitle')) {
            $video->subtitle = Helper::uploadFile($request->file('subtitle'), 'subtitle');
        }

        if ($request->video_240p != null || $request->video_240p != '') {
            $video->video_240p = Helper::uploadVideo($request->file('video_240p'), 'video');
        }
        $video->url_240p = $request->url_240p;

        if ($request->video_360p != null || $request->video_360p != '') {
            $video->video_360p = Helper::uploadVideo($request->file('video_360p'), 'video');
        }
        $video->url_360p = $request->url_360p;

        if ($request->video_480p != null || $request->video_480p != '') {
            $video->video_480p = Helper::uploadVideo($request->file('video_480p'), 'video');
        }
        $video->url_480p = $request->url_480p;

        if ($request->video_720p != null || $request->video_720p != '') {
            $video->video_720p = Helper::uploadVideo($request->file('video_720p'), 'video');
        }
        $video->url_720p = $request->url_720p;

        if ($request->video_1080p != null || $request->video_1080p != '') {
            $video->video_1080p = Helper::uploadVideo($request->file('video_1080p'), 'video');
        }
        $video->url_1080p = $request->url_1080p;

        $video->like = 0;
        $video->dislike = 0;
        $video->rating = 0;

        /* 360p */
        $video->download_gd_360p = $request->download_gd_360p;
        $video->download_zs_360p = $request->download_zs_360p;
        $video->download_sf_360p = $request->download_sf_360p;
        $video->download_rc_360p = $request->download_rc_360p;
        $video->download_kr_360p = $request->download_kr_360p;

        /* 480p */
        $video->download_gd_480p = $request->download_gd_480p;
        $video->download_zs_480p = $request->download_zs_480p;
        $video->download_sf_480p = $request->download_sf_480p;
        $video->download_rc_480p = $request->download_rc_480p;
        $video->download_kr_480p = $request->download_kr_480p;

        /* 720p */
        $video->download_gd_720p = $request->download_gd_720p;
        $video->download_zs_720p = $request->download_zs_720p;
        $video->download_sf_720p = $request->download_sf_720p;
        $video->download_rc_720p = $request->download_rc_720p;
        $video->download_kr_720p = $request->download_kr_720p;

        /* 1080p */
        $video->download_gd_1080p = $request->download_gd_1080p;
        $video->download_zs_1080p = $request->download_zs_1080p;
        $video->download_sf_1080p = $request->download_sf_1080p;
        $video->download_rc_1080p = $request->download_rc_1080p;
        $video->download_kr_1080p = $request->download_kr_1080p;

        $video->watch_count = 0;
        $video->is_approved = $request->has('is_approved') ? $request->is_approved : 0;
        $video->uploaded_by = 1;

        $video->save();

        return redirect()->route('video.index')->with('success', 'Video was created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Video::find($id);
        return view('admin.pages.video.show')->withVideo($video);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::find($id);
        $albums = Album::all();

        $albs = array();

        foreach ($albums as $album) {
            $albs[$album->id] = $album->name;
        }

        return view('admin.pages.video.edit')->withVideo($video)->withAlbums($albs);
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
            'name' => 'required|min:2',
            'subtitle' => 'sometimes|file'
        ));

        $video = Video::find($id);

        $video->album_id = $request->album_id;
        $video->name = $request->name;
        $video->slug = str_slug($request->name, '-');

        if ($request->hasFile('subtitle')) {
            $old_subtitle = $video->subtitle;
            $video->subtitle = Helper::uploadFile($request->file('subtitle'), 'subtitle');
            // Storage::delete(Helper::getNameFileFromUrl($old_subtitle));
        }

        if ($request->video_240p != null || $request->video_240p != '') {
            $video->video_240p = Helper::uploadVideo($request->file('video_240p'), 'video');
        }
        $video->url_240p = $request->url_240p;

        if ($request->video_360p != null || $request->video_360p != '') {
            $video->video_360p = Helper::uploadVideo($request->file('video_360p'), 'video');
        }
        $video->url_360p = $request->url_360p;

        if ($request->video_480p != null || $request->video_480p != '') {
            $video->video_480p = Helper::uploadVideo($request->file('video_480p'), 'video');
        }
        $video->url_480p = $request->url_480p;

        if ($request->video_720p != null || $request->video_720p != '') {
            $video->video_720p = Helper::uploadVideo($request->file('video_720p'), 'video');
        }
        $video->url_720p = $request->url_720p;

        if ($request->video_1080p != null || $request->video_1080p != '') {
            $video->video_1080p = Helper::uploadVideo($request->file('video_1080p'), 'video');
        }
        $video->url_1080p = $request->url_1080p;

        /*if ($request->like != null || $request->like != '') {
            $video->like = $request->like;
        }*/

        /*if ($request->dislike != null || $request->dislike != '') {
            $video->dislike = $request->dislike;
        }*/

        /*if ($request->rating != null || $request->rating != '') {
            $video->rating = $request->rating;
        }*/

        /* 360p */
        $video->download_gd_360p = $request->download_gd_360p;
        $video->download_zs_360p = $request->download_zs_360p;
        $video->download_sf_360p = $request->download_sf_360p;
        $video->download_rc_360p = $request->download_rc_360p;
        $video->download_kr_360p = $request->download_kr_360p;

        /* 480p */
        $video->download_gd_480p = $request->download_gd_480p;
        $video->download_zs_480p = $request->download_zs_480p;
        $video->download_sf_480p = $request->download_sf_480p;
        $video->download_rc_480p = $request->download_rc_480p;
        $video->download_kr_480p = $request->download_kr_480p;

        /* 720p */
        $video->download_gd_720p = $request->download_gd_720p;
        $video->download_zs_720p = $request->download_zs_720p;
        $video->download_sf_720p = $request->download_sf_720p;
        $video->download_rc_720p = $request->download_rc_720p;
        $video->download_kr_720p = $request->download_kr_720p;

        /* 1080p */
        $video->download_gd_1080p = $request->download_gd_1080p;
        $video->download_zs_1080p = $request->download_zs_1080p;
        $video->download_sf_1080p = $request->download_sf_1080p;
        $video->download_rc_1080p = $request->download_rc_1080p;
        $video->download_kr_1080p = $request->download_kr_1080p;

        # system count
        /*if ($request->watch_count != null || $request->watch_count != '') {
            $video->watch_count = $request->watch_count;
        }*/

        $video->is_approved = $request->has('is_approved') ? $request->is_approved : 0;
        $video->uploaded_by = 1;

        $video->save();

        return redirect()->route('video.index')->with('success', 'Video was updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::find($id);
        $video->delete();
        return redirect()->route('video.index')->with('success', 'Video was deleted successfully!');
    }

    public function videoApprove(Request $request) {
        $video = Video::find($request->id);
        $video->is_approved = $request->approve_status;
        $video->save();

        return back()->with('success', $request->message . 'successfully!');
    }
}
