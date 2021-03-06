<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class Question extends Model
{
    use HasFactory;
    protected $table='questions';
    public $timestamps=false;


    public function etape() {
        return $this->belongsTo(Etape::class);
    }

    public function reponse() {
        return $this->hasMany(Reponse::class);
    }

    public function image() {
        return $this->hasOne(Image::class);
    }



}
