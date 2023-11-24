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
        Schema::create('project_attributes', function (Blueprint $table) {
            Schema::dropIfExists('project_attributes');
            $table->id();
            $table->foreignId('project_id')->onDelete('cascade');
            $table->foreignId('kozijnen_id')->onDelete('cascade');
            $table->string('value')->nullable(); // Add a column to store the attribute value
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
