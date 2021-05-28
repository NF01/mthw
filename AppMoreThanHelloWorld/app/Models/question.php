<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class Question extends Model
{
    use HasFactory;
    protected $table='questions';
    public $timestamps=false;


    public function chapitre() {
        return $this->belongsTo(Chapitre::class);
    }

    public function reponse() {
        return $this->hasMany(Reponse::class);
    }

    public function image() {
        return $this->hasMany(Image::class);
    }



}
