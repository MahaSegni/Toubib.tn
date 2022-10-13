<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieArticle extends Model
{
    use HasFactory;
    protected $fillable = ['libelle'];
    public function article(){
        return $this->hasMany(Article::class);
    }
}
