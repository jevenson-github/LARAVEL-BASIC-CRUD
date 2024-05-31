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
        Schema::create('notes', function (Blueprint $table) {
            $table->id('notesId');
            $table->unsignedBigInteger('userId');  // foreign key 
            $table->string('title'); 
            $table->string('body');
            $table->timestamps();
            $table->foreign('userId')->references('id')->on('users');      // for relationship 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
