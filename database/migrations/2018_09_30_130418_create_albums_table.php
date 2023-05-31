<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->text('sinopsis');
            $table->string('image_default');
            $table->string('image_banner');
            $table->string('durasi');
            $table->string('trailer');
            $table->date('release');
            $table->string('produser');
            $table->string('rating');
            $table->string('link_mal');
            $table->string('credit');
            $table->integer('status_id')->nullable()->unsigned();
            $table->integer('musim_id')->nullable()->unsigned();
            $table->integer('day_id')->nullable()->unsigned();
            // $table->integer('insight_id')->nullable()->unsigned();
            $table->integer('is_approved');
            $table->integer('uploaded_by');
            $table->text('keyword');
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
        Schema::dropIfExists('albums');
    }
}
