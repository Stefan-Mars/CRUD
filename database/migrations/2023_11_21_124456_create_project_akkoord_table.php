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
        Schema::create('project_akkoord', function (Blueprint $table) {
            $table->id();
            $table->foreignId("project_id")->nullable()->onDelete('cascade');
            $table->string("soortAanvraag");
            $table->string("naamOpdrachtgever");
            $table->string("ProjectAdres");
            $table->string("postcode");
            $table->string("woonplaats");
            $table->string("telefoonnummer");
            $table->string("Email");
            $table->string("naamMonteur");
            $table->string("doorWieAfTeWerken");
            $table->string("inTePlannenTijd");
            $table->string("ordernummerFabrikant");
            $table->string("ruimteSchoon");
            $table->string("ramenDeurenGoed");
            $table->string("eigendommenBeschadigd");
            $table->string("afwerkingUitgevoerd");
            $table->string("ruitenKozijnenOnbeschadigd");
            $table->string("overigePunten");
            $table->string("anderePunten")->nullable();

            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_akkoord');
    }
};
