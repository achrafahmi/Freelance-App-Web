<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('repports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('IdRepporter');
            $table->unsignedBigInteger('IdProject');
            $table->string('description');
            $table->timestamps();
        
            
            $table->foreign('IdRepporter')->references('id')->on('users');
            $table->foreign('IdProject')->references('id')->on('projets');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repports');
    }
};
