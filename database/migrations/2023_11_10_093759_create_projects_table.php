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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string("KlantNaam");
            $table->string("ProjectAdres");
            $table->string("Email");
            $table->string("Soort_Kozijn");
            $table->string("Afwerking_Kozijn");
            $table->string("Merk_Kozijn");
            $table->string("Kleur_Kozijn_Binnen");
            $table->string("Profielvorm_Kozijn");
            $table->string("Profielvorm_Draaideel");
            $table->string("Verbindingen");
            $table->string("Standaard_Passief_Kozijn");
            $table->string("Beglazing_U_Waarde");
            $table->string("Veiligheidsglas");
            $table->string("Roeden");
            $table->string("Wienersprossen");
            $table->string("Type_Opplakroede");
            $table->string("Warmedge_Afstandhouder");
            $table->string("Waterslagen_Type");
            $table->string("Vensterbanken_Type");
            $table->string("Roosters_Horizontaal/Verticaal");
            $table->string("Kleur_Roosters");
            $table->string("Horren");
            $table->string("Gordijnen/Zonwering");
            $table->string("Dorpels_Deuren");
            $table->string("Type_Scharnieren");
            $table->string("Kleur_Hang_En_Sluitwerk");
            $table->string("Montage_Nieuwbouw");
            $table->string("Nachtventilatie");



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
