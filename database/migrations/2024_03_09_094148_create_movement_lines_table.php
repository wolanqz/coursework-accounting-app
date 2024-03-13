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
        Schema::create('movement_lines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movement_id');
            $table->timestamps();

            $table->foreign('movement_id')->references('id')->on('movements');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movement_lines');
    }
};
