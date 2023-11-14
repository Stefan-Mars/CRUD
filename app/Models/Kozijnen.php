<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kozijnen extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = "kozijnen";
    protected $guarded = [];
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function attributes(): HasMany
    {
        return $this->hasMany(Attributes::class);
    }
};
