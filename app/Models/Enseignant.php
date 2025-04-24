<?php

namespace App\Models;

use App\Models\User;
use App\Models\Video;
use App\Models\Matiere;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    protected $fillable = ['utilisateur_id', 'matiere_id'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}

