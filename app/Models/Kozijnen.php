<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kozijnen extends Model
{
    use HasFactory;
    protected $table = "kozijnen";
    protected $fillable =[
        "Soort_Kozijn",
        "Afwerking_Kozijn",
        "Merk_Kozijn",
        "Kleur_Kozijn_Binnen",
        "Profielvorm_Kozijn",
        "Profielvorm_Draaideel",
        "Verbindingen",
        "Standaard_Passief_Kozijn",
        "Beglazing_U_Waarde",
        "Veiligheidsglas",
        "Roeden",
        "Wienersprossen",
        "Type_Opplakroede",
        "Warmedge_Afstandhouder",
        "Waterslagen_Type",
        "Vensterbanken_Type",
        "Roosters_Horizontaal/Verticaal",
        "Kleur_Roosters",
        "Horren",
        "Gordijnen/Zonwering",
        "Dorpels_Deuren",
        "Type_Scharnieren",
        "Kleur_Hang_En_Sluitwerk",
        "Montage_Nieuwbouw",
        "Nachtventilatie",
    ];
    public function attributes()
    {
        return $this->hasMany(Attributes::class);
    }
}
