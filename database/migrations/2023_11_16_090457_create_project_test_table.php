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
        Schema::create('project_test', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("ProjectNaam");
            $table->string("datum");
            $table->string("telefoonnummer");
            $table->string("totaalEuro");
            $table->string("dagen");
            $table->string("personen");
            $table->string("naam");
            $table->string("korting");
            for( $i = 0; $i < 33; $i++ ) {
                $table->string($i)->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_test');
    }
};
