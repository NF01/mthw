<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table='images';
    public $timestamps=false;

    public function question() {
        return $this->belongsTo(Question::class);
    }

    public function reponse() {
        return $this->belongsTo(Reponse::class);
    }
}
