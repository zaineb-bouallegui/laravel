<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    public function up()
    {
        
            Schema::create('locations', function (Blueprint $table) {
                $table->id(); 
                $table->string('name'); 
                $table->string('address'); 
                $table->decimal('latitude', 10, 6); 
                $table->decimal('longitude', 10, 6); 
                $table->string('image')->nullable(); 
                $table->string('city'); 
                $table->text('description')->nullable(); 
                $table->timestamps(); 
            });
        
        
    }

    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
