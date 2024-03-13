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
        Schema::create('movement_types', function (Blueprint $table) {
            $table->id();
            $table->dropPrimary('id');

            $table->unsignedBigInteger('movement_direction_type_id');
            $table->string('name');
            $table->timestamps();

            $table->primary(['id', 'movement_direction_type_id']);
            $table->foreign('movement_direction_type_id')->references('id')->on('movement_direction_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movement_types');
    }
};
