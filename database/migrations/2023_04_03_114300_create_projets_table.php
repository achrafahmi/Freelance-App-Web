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
        Schema::create('projets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('societe');
            $table->decimal('prix',10,2);
            $table->longText('description');
            $table->boolean('isAvailable')->default(true);
            $table->unsignedBigInteger('idCreateur');
            $table->foreign('idCreateur')->references('id')->on('Users');
            $table->unsignedBigInteger('idCategory');
            $table->foreign('idCategory')->references('id')->on('Categories');
            $table->timestamps();
        });
        Schema::table('projets', function (Blueprint $table) {
            $table->string('societe')->default('')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projets');
    }
};
