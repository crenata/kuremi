<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('album_id');
            $table->string('name');
            $table->string('slug');
            $table->string('subtitle')->nullable();
            $table->string('video_240p')->nullable();
            $table->string('url_240p')->nullable();
            $table->string('video_360p')->nullable();
            $table->string('url_360p')->nullable();
            $table->string('video_480p')->nullable();
            $table->string('url_480p')->nullable();
            $table->string('video_720p')->nullable();
            $table->string('url_720p')->nullable();
            $table->string('video_1080p')->nullable();
            $table->string('url_1080p')->nullable();
            $table->integer('like');
            $table->integer('dislike');
            $table->string('rating');
            $table->string('download_gd_360p')->nullable();
            $table->string('download_zs_360p')->nullable();
            $table->string('download_sf_360p')->nullable();
            $table->string('download_rc_360p')->nullable();
            $table->string('download_kr_360p')->nullable();
            $table->string('download_gd_480p')->nullable();
            $table->string('download_zs_480p')->nullable();
            $table->string('download_sf_480p')->nullable();
            $table->string('download_rc_480p')->nullable();
            $table->string('download_kr_480p')->nullable();
            $table->string('download_gd_720p')->nullable();
            $table->string('download_zs_720p')->nullable();
            $table->string('download_sf_720p')->nullable();
            $table->string('download_rc_720p')->nullable();
            $table->string('download_kr_720p')->nullable();
            $table->string('download_gd_1080p')->nullable();
            $table->string('download_zs_1080p')->nullable();
            $table->string('download_sf_1080p')->nullable();
            $table->string('download_rc_1080p')->nullable();
            $table->string('download_kr_1080p')->nullable();
            $table->integer('watch_count');
            $table->integer('is_approved');
            $table->integer('uploaded_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
