<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamations extends Model
{
    use HasFactory;
    protected $fillable = ['objet', 'message', 'image'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function reponsesreclamations()
    {
    	return $this->hasMany(ReponseReclamations::class);
    }
}
