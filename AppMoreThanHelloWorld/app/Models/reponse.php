<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reponse extends Model
{
    use HasFactory;
    protected $table='question';
    public $timestamps=false;


    public function question() {
        return $this->belongsTo(question::class);
    }

}