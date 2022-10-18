<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamations extends Model
{
    use HasFactory;
    public function user(){
        return $this->hasOne(User::class);
    }
    public function reponsesreclamations()
    {
    	return $this->hasMany(reponsesreclamations::class);
    }
}
