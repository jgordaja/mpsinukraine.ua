<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMpsTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mps_types', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->mediumText('content')->comment('описание типа');
            $table->text('link_booklet')->nullable()->comment('ссылка на буклет');
            $table->text('link_protocol')->nullable()->comment('ссылка на протокол лечения');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mps_types');
    }
}
