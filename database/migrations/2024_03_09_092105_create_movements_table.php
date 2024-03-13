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
        Schema::create('movements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movement_direction_type_id');
            $table->unsignedBigInteger('movement_type_id')->nullable();
            $table->timestamps();

            $table->foreign('movement_direction_type_id')->references('id')->on('movement_direction_types');
            $table->foreign(['movement_type_id', 'movement_direction_type_id'])->references(['id', 'movement_direction_type_id'])->on('movement_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movements');
    }
};
