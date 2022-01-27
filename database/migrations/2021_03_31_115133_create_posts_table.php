<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{

    const STATUS_ON = 1;
    const STATUS_OFF = 2;
    const TOP_ON = 2;
    const TOP_OFF = 1;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->mediumText('content');
            $table->date('date');
            $table->string('img_name');
            $table->string('img_path');
            $table->unsignedBigInteger('status_id')->default(1);
            $table->unsignedBigInteger('top_id')->default(2);
            $table->unsignedBigInteger('user_id');
            $table->softDeletes();
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
