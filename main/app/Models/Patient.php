<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'prenom','age','poids','taille','medecin_id'];
    public function medecin(){
        return $this->belongsTo(Medecin::class);
    }
    public function fiche(){
        return $this->hasMany(Fiche::class);
    }
}
