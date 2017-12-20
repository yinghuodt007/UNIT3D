<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetaDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meta_data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('imdb')->unique();
            $table->string('tmdb')->unique()->nullable();
            $table->string('title')->nullable();
            $table->string('year')->nullable();
            $table->text('plot')->nullable();
            $table->string('genre')->nullable();
            $table->string('rated')->nullable();
            $table->string('runtime')->nullable();
            $table->string('imdbrating')->nullable();
            $table->string('imdbvotes')->nullable();
            $table->string('tmdbrating')->nullable();
            $table->string('tmdbvotes')->nullable();
            $table->string('poster')->nullable();
            $table->string('backdrop')->nullable();
            $table->string('trailer')->nullable();
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
        Schema::drop('meta_data');
    }
}
