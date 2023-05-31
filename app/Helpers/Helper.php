<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

use App\Models\Album;
use App\Models\AlbumType;
use App\Models\Comment;
use App\Models\Genre;
use App\Models\Musim;
use App\Models\Status;
use App\Models\Type;
use App\Models\Video;

use Session;
use Storage;

class Helper {

	/**
     * generate key for random name
     * @return String
     */
    public static function getRandomName() {
        return uniqid(date('Ymd') . md5(uniqid(rand(), true)));
    }

    public static function interventionUploadImage($picture, $size = array('width', 'height')) {
        $randomName = Helper::getRandomName();
        $extension = Helper::getExtension($picture);
        $filename = $randomName . '.' . $extension;
        $location = Helper::directoryUpload('image/', $filename);

        $width = $size['width'];
        $height = $size['height'];

        if ($width != null || $width != '' || $height != null || $height != '') {
        	Image::make($picture)->resize($width, $height)->save($location);
        } else {
        	Image::make($picture)->save($location);
        }

        return url("public/image/$filename");
    }

    /**
     * upload video into video directory
     */
    public static function uploadVideo($video) {
        $filename = Helper::getRandomName() . '.' . Helper::getExtension($video);
        $video->move(public_path('video/'), $filename);
        return url("public/video/$filename");
    }

    /**
     * upload file into file directory
     */
    public static function uploadFile($file, $directory) {
        $filename = Helper::getRandomName() . '.' . Helper::getExtension($file);
        $file->move(public_path($directory), $filename);
        return url("public/$directory/$filename");
    }

    /**
     * get location for public directory
     * @param String $directory
     * @param File $filename
     */
    public static function directoryUpload($directory, $filename) {
        return public_path($directory . $filename);
    }

    /**
     * get extension
     * @param File $file
     */
    public static function getExtension($file) {
        return $file->getClientOriginalExtension();
    }

    /**
     * get file name from url using str_replace()
     * @param String $url
     * @return String $filename
     */
    public static function getNameFileFromUrl($url) {
        return str_replace(url("public/image/"), '', $url);
    }

    /**
     * get anime recents upload for recents anime tv
     */
    public static function recentsTV() {
        return AlbumType::where('type_id', 4)->orderBy('id', 'desc')->limit(7)->get();
    }

    /**
     * get anime recents upload for recents anime movie
     */
    public static function recentsMovie() {
        return AlbumType::where('type_id', 1)->orderBy('id', 'desc')->limit(7)->get();
    }

    /**
     * get anime recents upload for recents anime ova
     */
    public static function recentsOVA() {
        return AlbumType::where('type_id', 2)->orderBy('id', 'desc')->limit(7)->get();
    }

    /**
     * get anime recents upload for recents anime special
     */
    public static function recentsSpecial() {
        return AlbumType::where('type_id', 3)->orderBy('id', 'desc')->limit(7)->get();
    }

    /**
     * get all genre orderBy name asc
     */
    public static function genres() {
        return Genre::orderBy('name', 'asc')->get();
    }

    /**
     * get all type orderBy name asc
     */
    public static function types() {
        return Type::orderBy('name', 'asc')->get();
    }

    /**
     * get all musim
     */
    public static function musims() {
        return Musim::all();
    }

    /**
     * get all populars anime
     */
    public static function populars() {
        return Album::popularLast(2)->get();
    }

    /**
     * get all comments anime and count the comments
     */
    public static function comments($album_id) {
        return Comment::where('album_id', $album_id)->get();
    }

    /**
     * submit video watched
     */
    public static function watch_video($video) {
        $video->visit();
    }

    /**
     * get file info from url with curl
     */
    public static function getFileSizeFromUrl($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, TRUE);
        curl_setopt($ch, CURLOPT_NOBODY, TRUE);
        $data = curl_exec($ch);
        $size = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
        curl_close($ch);

        $mb = $size / (1024 * 1024);
        return number_format($mb, 2) . " MB";
    }
}