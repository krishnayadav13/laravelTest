<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Blog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('user_id')->nullable()->unsigned();
        $table->string('title')->nullable();
        $table->string('description')->nullable();
        $table->boolean('is_active')->default(True);
        $table->string('image_path')->nullable();
        $table->date('start_date')->nullable();
        $table->date('end_date')->nullable();
        $table->timestamps();
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
        //
    }
}
