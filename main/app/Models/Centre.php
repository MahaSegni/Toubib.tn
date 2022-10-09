<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centre extends Model
{
    use HasFactory;
    public function user(){
        return $this->hasOne(User::class);
    }
    public function services(){
        return $this->hasMany(Service::class);
    }
}
