<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectInfo extends Model
{
    use HasFactory;
    protected $table = "project_info";
    protected $guarded = [];
    public function buttons()
    {
        return $this->hasMany(Button::class);
    }
    public function projects()
    {
        return $this->belongsTo(Project::class);
    }
}
