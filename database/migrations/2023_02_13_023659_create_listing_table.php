<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //This is a sample file created using migration
    {
        Schema::create('listing', function (Blueprint $table) {
            $table->id();
            $table->String('title');
            $table->String('tags');
            $table->String('company');
            $table->String('location');
            $table->String('email');
            $table->String('website');
            $table->longText('description');
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
        Schema::dropIfExists('listing');
    }
}
