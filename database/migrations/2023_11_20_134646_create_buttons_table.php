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
        Schema::create('buttons', function (Blueprint $table) {
            Schema::dropIfExists('buttons');
            $table->id();
            $table->foreignId("project_info_id");
            for( $i = 1; $i < 22; $i++ ) {
                $table->string('field'.$i)->nullable();
            }
            for( $i = 1; $i < 22; $i++ ) {
                $table->string('inclusief'.$i)->nullable();
            }
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buttons');
    }
};
