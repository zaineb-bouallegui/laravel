<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('location_id'); // Foreign key to associate with locations
            $table->string('url'); // Path to the photo
            $table->string('title')->nullable(); // Optional title for the photo
            $table->text('description')->nullable(); // Optional description for the photo
            $table->timestamps();
            
            // Define the foreign key relationship with the 'locations' table
            $table->foreign('location_id')->references('id')->on('locations');
        });
    }

    public function down()
    {
        Schema::dropIfExists('photos');
    }
};
