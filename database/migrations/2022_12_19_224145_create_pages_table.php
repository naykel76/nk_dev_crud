<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('route_prefix')->nullable();
            $table->string('slug')->nullable(); // allow duplicates and seperate by route_prefix
            $table->string('title');
            $table->string('headline')->nullable();
            $table->longText('description')->nullable();
            $table->longText('body')->nullable();
            $table->string('image_name')->nullable();
            $table->string('thumbnail')->nullable();
            $table->integer('sort_order')->nullable()->default(0);
            $table->dateTime('published_at')->nullable();
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
        Schema::dropIfExists('pages');
    }
};
