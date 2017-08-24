<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReleasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('releases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->string('release_number');
            $table->timestamp('release_date');
            $table->integer('artist_id')->unsigned();
            $table->string('album_cover_file_name')->nullable();
            $table->integer('album_cover_file_size')->nullable();
            $table->string('album_cover_content_type')->nullable();
            $table->timestamp('album_cover_updated_at')->nullable();
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
        Schema::dropIfExists('releases');
    }
}
