<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReponseReclamations extends Model
{
    use HasFactory;


    public function reclamations()
    {
    	return $this->belongsTo(ReponseReclamations::class);
    }
}
