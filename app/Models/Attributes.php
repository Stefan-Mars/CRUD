<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    use HasFactory;
    protected $fillable = ['attribute', 'kozijn_id'];

    public function kozijn()
    {
        return $this->belongsTo(Kozijnen::class);
    }
    
}
