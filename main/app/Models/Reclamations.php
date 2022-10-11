<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamations extends Model
{
    use HasFactory;
protected $table = "reclamations";
protected $primaryKey = "id";
    protected $fillable = [
        'objet',
        'message',
        'statut',
        'datecreation'
    ];
}
