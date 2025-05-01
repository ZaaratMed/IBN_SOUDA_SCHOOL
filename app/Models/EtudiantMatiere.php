<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EtudiantMatiere extends Model
{
    protected $table = 'etudiant_matiere';

    protected $fillable = ['etudiant_id', 'matiere_id'];

    public function etudiant()
    {
        return $this->belongsTo(User::class, 'etudiant_id');
    }

    public function matiere()
    {
        return $this->belongsTo(Matiere::class, 'matiere_id');
    }
}

