<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Crypt;

use App\User;

use App\Models\Album;
use App\Models\AlbumType;
use App\Models\AlbumGenre;
use App\Models\Comment;
use App\Models\Day;
use App\Models\Genre;
use App\Models\Insight;
use App\Models\Musim;
use App\Models\Negara;
use App\Models\Peran;
use App\Models\Status;
use App\Models\Type;
use App\Models\Video;

use App\Helpers\Helper;

use Session;
use Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ongoings = Album::where('status_id', 1)->orderBy('id', 'desc')->paginate(7);
        $completes = Album::where('status_id', 2)->orderBy('id', 'desc')->paginate(7);

        $videos = Video::orderBy('id', 'desc')->paginate(7);
        
        return view('pages.home')->withVideos($videos)->withOngoings($ongoings)->withCompletes($completes)->withGenres(Helper::genres())->withTypes(Helper::types())->withPopulars(Helper::populars())->withMusims(Helper::musims())->withRecentsTv(Helper::recentsTV())->withRecentsMovie(Helper::recentsMovie())->withRecentsOva(Helper::recentsOVA());
    }

    public function animelist() {
        $albums = Album::orderBy('name', 'asc')->get();

        return view('pages.animelist')->withAlbums($albums)->withGenres(Helper::genres())->withTypes(Helper::types())->withPopulars(Helper::populars())->withMusims(Helper::musims())->withRecentsTv(Helper::recentsTV())->withRecentsMovie(Helper::recentsMovie())->withRecentsOva(Helper::recentsOVA());
    }

    public function genres() {        
        return view('pages.genres')->withGenres(Helper::genres())->withTypes(Helper::types())->withPopulars(Helper::populars())->withMusims(Helper::musims())->withRecentsTv(Helper::recentsTV())->withRecentsMovie(Helper::recentsMovie())->withRecentsOva(Helper::recentsOVA());
    }

    public function ongoings() {
        $ongoings = Album::where('status_id', 1)->orderBy('id', 'desc')->paginate(7);
        
        return view('pages.ongoings')->withOngoings($ongoings)->withGenres(Helper::genres())->withTypes(Helper::types())->withPopulars(Helper::populars())->withMusims(Helper::musims())->withRecentsTv(Helper::recentsTV())->withRecentsMovie(Helper::recentsMovie())->withRecentsOva(Helper::recentsOVA());
    }

    public function jadwal() {
        $days = Day::all();
        $nowmusim = Musim::get()->last();
        $albums = Album::where('musim_id', $nowmusim->id)->orderBy('day_id', 'asc')->get();

        return view('pages.jadwal')->withDays($days)->withAlbums($albums)->withGenres(Helper::genres())->withTypes(Helper::types())->withPopulars(Helper::populars())->withMusims(Helper::musims())->withRecentsTv(Helper::recentsTV())->withRecentsMovie(Helper::recentsMovie())->withRecentsOva(Helper::recentsOVA());
    }

    public function albumShow($slug) {
        $album = Album::where('slug', $slug)->first();
        // $album->visit();
        $musims = Musim::all();

        return view('pages.album.view')->withAlbum($album)->withPopulars(Helper::populars())->withGenres(Helper::genres())->withTypes(Helper::types())->withMusims($musims)->withRecentsTv(Helper::recentsTV())->withRecentsMovie(Helper::recentsMovie())->withRecentsOva(Helper::recentsOVA());
    }

    public function genreDetails($slug) {
        $genre = Genre::where('slug', $slug)->first();
        $albumsgenre = AlbumGenre::where('genre_id', $genre->id)->orderBy('id', 'desc')->paginate(7);
        return view('pages.genre.view')->withGen($genre)->withAlbums($albumsgenre)->withGenres(Helper::genres())->withTypes(Helper::types())->withPopulars(Helper::populars())->withMusims(Helper::musims())->withRecentsTv(Helper::recentsTV())->withRecentsMovie(Helper::recentsMovie())->withRecentsOva(Helper::recentsOVA());
    }

    public function typeDetails($slug) {
        $type = Type::where('slug', $slug)->first();
        $albumstype = AlbumType::where('type_id', $type->id)->orderBy('id', 'desc')->paginate(7);
        return view('pages.type.view')->withType($type)->withAlbums($albumstype)->withGenres(Helper::genres())->withTypes(Helper::types())->withPopulars(Helper::populars())->withMusims(Helper::musims())->withRecentsTv(Helper::recentsTV())->withRecentsMovie(Helper::recentsMovie())->withRecentsOva(Helper::recentsOVA());
    }

    public function musimDetails($slug) {
        $musim = Musim::where('slug', $slug)->first();
        $albums = Album::where('musim_id', $musim->id)->orderBy('id', 'desc')->paginate(7);
        return view('pages.musim.view')->withMusim($musim)->withAlbums($albums)->withGenres(Helper::genres())->withTypes(Helper::types())->withPopulars(Helper::populars())->withMusims(Helper::musims())->withRecentsTv(Helper::recentsTV())->withRecentsMovie(Helper::recentsMovie())->withRecentsOva(Helper::recentsOVA());
    }

    public function playVideo($slug) {
        $video = Video::where('slug', $slug)->first();
        $album = Album::where('id', $video->album_id)->first();

        return view('pages.video.view')->withVideo($video)->withAlbum($album)->withGenres(Helper::genres())->withTypes(Helper::types())->withPopulars(Helper::populars())->withMusims(Helper::musims())->withRecentsTv(Helper::recentsTV())->withRecentsMovie(Helper::recentsMovie())->withRecentsOva(Helper::recentsOVA());
    }

    public function albumComment(Request $request) {
        $this->validate($request, array(
            'album_id' => 'required|numeric',
            // 'user_id' => 'required|numeric',
            'comment' => 'required|min:1'
        ));

        $comment = new Comment;

        $comment->parent_id = $request->has('parent_id') ? $request->parent_id : 0;
        $comment->album_id = $request->album_id;
        $comment->user_id = Auth::user()->id;
        $comment->comment = $request->comment;

        $comment->save();

        return back();
    }

    public function search(Request $request) {
        $albums = Album::where('keyword', 'like', "%{$request->keyword}%")->get();
        /* get / paginate, links() method hanya buat paginate */
        return view('pages.search')->withKeyword($request->keyword)->withAlbums($albums)->withGenres(Helper::genres())->withTypes(Helper::types())->withPopulars(Helper::populars())->withMusims(Helper::musims())->withRecentsTv(Helper::recentsTV())->withRecentsMovie(Helper::recentsMovie())->withRecentsOva(Helper::recentsOVA());
    }

    public function downloadEncrypt($encrypt) {
        // $encrypted = Crypt::encryptString("Hello world");
        // $decrypted = Crypt::decryptString($encrypt);
        return view('pages.download.encrypt')->withEncrypt($encrypt);
    }

    public function downloadDecrypt($decrypt) {
        $decrypted = Crypt::decryptString($decrypt);
        return view('pages.download.decrypt')->withDecrypt($decrypted);
    }

    public function download() {
        return view('pages.download.download');
    }

    public function watched(Request $request) {
        $video = Video::find($request->id);
        $video->visit();
        return view('pages.download.download');
    }
}
