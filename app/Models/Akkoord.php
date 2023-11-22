<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akkoord extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "project_akkoord";
    public function projects()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
