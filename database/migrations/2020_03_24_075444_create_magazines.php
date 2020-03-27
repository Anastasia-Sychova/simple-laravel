<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMagazines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('magazines', function (Blueprint $table) {
            $table->id();
            $table->string('title', 256);
            $table->string('name', 256);
            $table->string('publisher', 256);
            $table->string('publication_code', 256);
            $table->integer('publication_number');
            $table->timestamptz('publication_date');
            $table->string('country', 2);
            $table->string('language', 5);
            $table->json('genres');
            $table->boolean('is_test')->default(false);
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
        Schema::dropIfExists('magazines');
    }
}
