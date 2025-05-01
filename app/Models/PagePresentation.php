<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagePresentation extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'contenu',
        'image_url',
    ];
}
