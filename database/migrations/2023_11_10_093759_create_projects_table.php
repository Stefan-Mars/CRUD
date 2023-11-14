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
            $table->string("Soort_Kozijn")->nullable();
            $table->string("Afwerking_Kozijn")->nullable();
            $table->string("Merk_Kozijn")->nullable();
            $table->string("Kleur_Kozijn_Binnen")->nullable();
            $table->string("Profielvorm_Kozijn")->nullable();
            $table->string("Profielvorm_Draaideel")->nullable();
            $table->string("Verbindingen")->nullable();
            $table->string("Standaard_Passief_Kozijn")->nullable();
            $table->string("Beglazing_U_Waarde")->nullable();
            $table->string("Veiligheidsglas")->nullable();
            $table->string("Roeden")->nullable();
            $table->string("Wienersprossen")->nullable();
            $table->string("Type_Opplakroede")->nullable();
            $table->string("Warmedge_Afstandhouder")->nullable();
            $table->string("Waterslagen_Type")->nullable();
            $table->string("Vensterbanken_Type")->nullable();
            $table->string("Roosters_Horizontaal/Verticaal")->nullable();
            $table->string("Kleur_Roosters")->nullable();
            $table->string("Horren")->nullable();
            $table->string("Gordijnen/Zonwering")->nullable();
            $table->string("Dorpels_Deuren")->nullable();
            $table->string("Type_Scharnieren")->nullable();
            $table->string("Kleur_Hang_En_Sluitwerk")->nullable();
            $table->string("Montage_Nieuwbouw")->nullable();
            $table->string("Nachtventilatie")->nullable();



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
