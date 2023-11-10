<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('best_freelancers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idFreelancer')->unsigned();
            $table->decimal('rate', 8, 2);
            $table->timestamps();
        });
        
        Schema::table('best_freelancers', function (Blueprint $table) {
            $table->foreign('idFreelancer')->references('id')->on('freelancers')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('best_freelacers');
    }
};
