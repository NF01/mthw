<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    use HasFactory;

    protected $table = 'reponses';
    public $timestamps = false;



    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    
    public function image()
    {
        return $this->hasOne(Image::class);
    }
}
