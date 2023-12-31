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
        Schema::create('project_info', function (Blueprint $table) {
            $table->id();
            $table->foreignId("project_id")->nullable()->onDelete('cascade');
            $table->string("ProjectNaam");
            $table->string("datumBestelling");
            $table->string("telefoonnummer");
            $table->string("datum");
            $table->string("label");
            $table->string("totaalEuro");
            $table->string("dagen");
            $table->string("personen");
            $table->string("naam");
            $table->string("korting");
            $table->string("diversen")->nullable();
            $table->string("Kraan")->nullable();
            $table->string("Kraantype")->nullable();
            $table->string("BTW");
            $table->string("inmeting");
            $table->string("orderVerwerktDoor");
            $table->string("gevelbekleding")->nullable();
            $table->string("SRLM")->nullable();
            $table->string("gordijnen")->nullable();
            $table->string("ZetWater")->nullable();
            $table->string("Electrawerk")->nullable();
            $table->string("Loodgieterswerk")->nullable();
            $table->string("Stuckvloer")->nullable();
            $table->string("afvoer")->nullable();
            $table->string("hulpIntillen")->nullable();
            $table->string("andereGevelbekleding")->nullable();
            

            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_info');
    }
};
