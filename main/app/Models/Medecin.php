<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    use HasFactory;
    protected $fillable = ['gouvernorat', 'adresse','specialite','tell','user_id'];
    public function user(){
        return $this->hasOne(User::class);
    }
    public function patient(){
        return $this->hasMany(Patient::class);
    }

}
