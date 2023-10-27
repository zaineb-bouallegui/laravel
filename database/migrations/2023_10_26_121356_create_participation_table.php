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
        Schema::create('participation', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("prenom");
            $table->enum('status', ['attente', 'accepter', 'refuser']);
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('event');
          
            $table->timestamps();

         
           
        });
    }

    public function down()
    {
        Schema::dropIfExists('participation');
    }
};
