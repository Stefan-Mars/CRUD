<?php

namespace Database\Seeders;

use App\Models\Attributes;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
 
        Attributes::insert(
            [
            "Soort_Kozijn" => "Hout mer - afror - fadura, Kunstof, Aluminium, Kunstof - Aluminium",
            "Afwerking_Kozijn" => "Gegrond - gespoten, Houtenerf - glad, Standaard - Ralkleur, Glad - Standaard - Ralkleur",
            "Merk_Kozijn" => "Profiel, Veka, Schuco, Gealan, Gaycko",
            "Kleur_Kozijn_Binnen" => "Kleur Kozijn Buiten, Kleur Draaid. Binnen, Kleur Draaid. Buiten",
            "Profielvorm_Kozijn" => "Vlak - Verdiep - Renaisance, Vlak - Blok - Maasland, Vlak - Blok - Dritto, Vlak",
            "Profielvorm_Draaideel" => "Modern - Klassiek, Valk-Fino-Retro, Vlak-Dritto-Fino, Vlak-Fino",
            "Verbindingen" => "Recht, Gelast-Recht, Versterkt, Versterkt-Gelast",
            "Standaard_Passief_Kozijn" => "Purenit Kern, Schuimvulling, Ht - Nt - Large -Passief",
            "Beglazing_U_Waarde" => "Hr ++ - Tripple",
            "Veiligheidsglas" => "Gelaagd Binnen, Gelaagd Buiten, Gelaagd Bi en Bu, Zonwerend Glas",
            "Roeden" => "In het glas, op het glas, In en op het glas",
            "Wienersprossen" => "Breedte, Kleur",
            "Type_Opplakroede" => "2653-2653c-2654, 627-624-689-698-062, 060-061-066-064-062-065",
            "Warmedge_Afstandhouder" => "Kleur",
            "Waterslagen_Type" => "Zetwerk",
            "Vensterbanken_Type" => "Diepte, Kleur Vensterbank",
            "Roosters_Horizontaal/Verticaal" => "Glasrooster-Opbouw",
            "Kleur_Roosters" => "Binnen, Buiten, Roosterstang",
            "Horren" => "Inzet - Rolhor - Plisse",
            "Gordijnen/Zonwering" => "Plisse - Luxaflex - Rolgordijn - Screens - Luxaflex",
            "Dorpels_Deuren" => "Alu - Dts - Hardsteen - hout",
            "Type_Scharnieren" => "Blockscharnier, Knoopscharnier, Royal Beslag, Politie Keurmerk",
            "Kleur_Hang_En_Sluitwerk" => "Kozijn - Alu - Rvs, Afsluitbaar, Alarmcontacten, Drangers",
            "Montage_Nieuwbouw" => "Montage Renovatie, Afwerking Inclusief, Afwerking Exclusief, Stelkozijnen leveren j-n, Klimmateriaal",
            "Nachtventilatie" => "Kierstandhouder, Panelen Type",
            ]
        );
    }
}
