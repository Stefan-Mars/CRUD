<?php

namespace App\Models;

use App\Models\ProjectInfo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Button extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function projectInfo()
    {
        return $this->belongsTo(ProjectInfo::class);
    }
}
