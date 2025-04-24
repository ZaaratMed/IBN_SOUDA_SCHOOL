<?php

namespace App\Models;

use App\Models\Enseignant;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    protected $fillable = ['name', 'description'];

    public function enseignants()
    {
        return $this->hasMany(Enseignant::class);
    }
}

