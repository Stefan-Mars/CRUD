<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Content::insert([
            [
                "content" => "Montage van de kozijnen incl.klim en hijsmateriaal en of hulp",
            ],
            [
                "content" => "Montagemateriaal (schroeven, band, rubbers, blokjes)",
            ],
            [
                "content" => "Stelkozijnen leveren aanbrengen indien nodig (incl. purren binnenzijde)",
            ],
            [
                "content" => "Afwerking binnenzijde (wit gegronde koplat)",
            ],
            [
                "content" => "Nieuwe vensterbanken (prijs per m1 €79,00 incl. BTW netto) inclusief",
            ],
            [
                "content" => "Hergebruiken bestaande vensterbanken (indien mogelijk)",
            ],
            [
                "content" => "<input type='radio' name='gevelbekleding' value='Keralit'> Keralit <input type='radio' name='gevelbekleding' value='Rockpanel'> Rockpanel <input
                type='radio' name='gevelbekleding' value='Trespa'> Trespa",
            ],
            [
                "content" => "Andere gevelbekleding:<input class='border border-slate-300' type='text' name='andereGevelbekleding'>",
            ],
            [
                "content" => "<input type='radio' name='SRLM' value='Screens'> Screens <input type='radio' name='SRLM' value='Rolluiken'> Rolluiken <input
                type='radio' name='SRLM' value='Leveren'> Leveren <input type='radio' name='SRLM' value='Monteren'> Monteren",
            ],
            [
                "content" => "Deurhorren (op nabestellingen) offerte",
            ],
            [
                "content" => "<input type='radio' name='gordijnen' value='Plissegordijnen'> Plissegordijnen <input type='radio' name='gordijnen' value='Luxaflex'> Luxaflex
                <input type='radio' name='gordijnen' value='Shutters'> Shutters <input type='radio' name='gordijnen' value='Rolgordijnen'> Rolgordijnen",
            ],
            [
                "content" => "Bestaande screens, rolluiken gordijnen terugplaatsen",
            ],
            [
                "content" => "<input type='radio' name='ZetWater' value='Zetwerk'> Zetwerk <input type='radio' name='ZetWater' value='Waterslagen'> Waterslagen
                (aluminium voor binnen of buiten) zie bijlage",
            ],
            [
                "content" => "Externe beglazing zoals lucaclair o.i.d",
            ],
            [
                "content" => "<input type='radio' name='werk' value='Electrawerk'> Electrawerk <input type='radio' name='werk' value='Loodgieterswerk'>
                Loodgieterswerk",
            ],
            [
                "content" => "Bouwkundig werk (incl spouwlatten aanbrengen indien nodig) door:",
            ],
            [
                "content" => "Muren verwijderen en puin afvoeren (excl vertanden metselwerk)",
            ],
            [
                "content" => "<input type='radio' name='Stuckvloer' value='Stucken_binnenzijde'> Stucken binnenzijde <input type='radio' name='Stuckvloer' value='Vloer_binnen_aanpassen'>
                Vloer binnen aanpassen",
            ],
            [
                "content" => "Lood aanbrengen (vervangen bestaand lood)",
            ],
            [
                "content" => "Afvoer oud materiaal <input type='radio' name='afvoer' value='Container'> Container <input
                type='radio' name='afvoer' value='Big_bag'> Big bag <input type='radio' name='afvoer' value='Glasblok'> Glasblok <input
                type='radio' name='afvoer' value='Monteur'> Monteur",
            ],
            [
                "content" => "Kraan: <input class='border border-slate-300' type='text' name='Kraan'> Kraantype <input type='radio' name='Kraantype' value='Kraantype'>",
            ],
        ]);
    }
}
