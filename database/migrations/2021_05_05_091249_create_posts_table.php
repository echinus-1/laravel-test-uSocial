<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
						//per migliorare leggibilita' colonne metto id per primi
						$table->bigInteger('user_id')->unsigned(); //->idType('user_id')
						//sarebbe piu' elegante se Laravel mettesse a disposizione un tipo idType
            $table->string('title');
            $table->string('content')->nullable();
            $table->timestamps();
						$table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
