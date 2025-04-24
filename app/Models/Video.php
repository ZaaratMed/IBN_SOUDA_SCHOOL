<?php

namespace App\Models;

use App\Models\Enseignant;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['titre', 'description', 'url', 'niveau', 'enseignant_id'];

    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class);
    }
}
