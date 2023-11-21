<?php

namespace Database\Seeders;

use App\Models\Kozijnen;
use Illuminate\Database\Seeder;

class KozijnenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
 
        Kozijnen::insert([
            ["kozijn" => "Soort_Kozijn"],
            ["kozijn" => "Afwerking_Kozijn"],
            ["kozijn" => "Merk_Kozijn"],
            ["kozijn" => "Kleur_Kozijn_Binnen"],
            ["kozijn" => "Profielvorm_Kozijn"],
            ["kozijn" => "Profielvorm_Draaideel"],
            ["kozijn" => "Verbindingen"],
            ["kozijn" => "Standaard_Passief_Kozijn"],
            ["kozijn" => "Beglazing_U_Waarde"],
            ["kozijn" => "Veiligheidsglas"],
            ["kozijn" => "Roeden"],
            ["kozijn" => "Wienersprossen"],
            ["kozijn" => "Type_Opplakroede"],
            ["kozijn" => "Warmedge_Afstandhouder"],
            ["kozijn" => "Waterslagen_Type"],
            ["kozijn" => "Vensterbanken_Type"],
            ["kozijn" => "Roosters_Horizontaal/Verticaal"],
            ["kozijn" => "Kleur_Roosters"],
            ["kozijn" => "Horren"],
            ["kozijn" => "Gordijnen/Zonwering"],
            ["kozijn" => "Dorpels_Deuren"],
            ["kozijn" => "Type_Scharnieren"],
            ["kozijn" => "Kleur_Hang_En_Sluitwerk"],
            ["kozijn" => "Montage_Nieuwbouw"],
            ["kozijn" => "Nachtventilatie"],
        ]


        );
    }
}
