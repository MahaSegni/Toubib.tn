<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fiche extends Model
{
    use HasFactory;
    protected $fillable = ['date_visite','type','description','patient_id'];
    public function medecin(){
        return $this->belongsTo(Patient::class);
    }
}
