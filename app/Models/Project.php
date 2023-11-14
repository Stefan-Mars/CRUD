<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    protected $guarded = [];
    public function kozijnen(): HasMany
    {
        return $this->hasMany(Kozijnen::class);
    }
}
