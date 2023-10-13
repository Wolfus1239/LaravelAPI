<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->id();
            $table->string('artist')->nullable();
            $table->json('duration')->nullable();
            $table->integer('size')->nullable();
            $table->string('file')->nullable();
            $table->boolean('lossless_file')->nullable();
            $table->boolean('playable')->default(false)->nullable();
            $table->integer('bpm')->nullable();
            $table->string('tonality')->nullable();
            $table->boolean('is_explicit')->default(false)->nullable();
            $table->string('md5')->nullable();
            $table->json('tags')->nullable();
            $table->json('genres')->nullable();
            $table->json('moods')->nullable();
            $table->string('countries')->nullable();
            $table->unsignedBigInteger('label_id')->nullable();
            $table->integer('position')->nullable();
            $table->text('description')->nullable();
            $table->string('cover')->nullable();
            $table->integer('total_count')->nullable();
            $table->integer('total_size')->nullable();
//            $table->json('total_duration')->nullable();
            $table->string('name')->nullable();
            $table->integer('id_track')->nullable();
//            $table->json('collection')->nullable();
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
        Schema::dropIfExists('tracks');
    }
}
