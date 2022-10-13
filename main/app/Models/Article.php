<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['titre', 'texte', 'video','image','categorie_article_id','user_id','auteur'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function categorieArticle(){
        return $this->belongsTo(CategorieArticle::class);
    }
    public function note(){
        return $this->hasMany(Note::class);
    }
    public function commentaire(){
        return $this->hasMany(Commentaire::class);
    }
}
