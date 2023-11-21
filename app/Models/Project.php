<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Project extends Model
{
    protected $guarded = [];

    public function kozijnen()
    {
        return $this->belongsToMany(Kozijnen::class, 'project_attributes')->withPivot('value');
    }
    public function info()
    {
        return $this->hasOne(projectInfo::class);
    }
    public function akkoord()
    {
        return $this->hasOne(Akkoord::class);
    }

}
