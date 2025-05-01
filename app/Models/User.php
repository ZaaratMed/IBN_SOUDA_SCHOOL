<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use App\Models\Matiere;
use App\Models\Enseignant;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];
    protected $casts = [
        'role_id' => 'integer',
    ];
    

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function enseignant()
    {
        return $this->hasOne(Enseignant::class);
    }
    public function matieres()
{
    return $this->belongsToMany(Matiere::class, 'etudiant_matiere', 'etudiant_id', 'matiere_id');
}

    public function isAdmin()
    {
        return $this->role->nom === 'admin';
    }

    public function isEnseignant()
    {
        return $this->role->nom === 'enseignant';
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
