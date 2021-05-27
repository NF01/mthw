<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class question extends Model
{
    use HasFactory;
    protected $table='question';
    public $timestamps=false;


    public function chapitre() {
        return $this->belongsTo(chapite::class);
    }

    public function reponse() {
        return $this->hasMany(reponse::class);
    }

    public function image() {
        return $this->hasMany(image::class);
    }



}
