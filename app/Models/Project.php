<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    protected $guarded = [];

    public function kozijnen()
    {
        return $this->belongsToMany(Kozijnen::class, 'project_attributes')->withPivot('value','extraInfo');
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
