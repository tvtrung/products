<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title')->nullable();
            $table->text('slug')->nullable();
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->text('photo')->nullable();
            $table->integer('cat_id')->nullable();
            $table->integer('status')->nullable();
            $table->integer('view')->nullable();
            $table->integer('order')->nullable();
            $table->longText('params')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
