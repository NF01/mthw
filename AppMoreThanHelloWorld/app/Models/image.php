<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    use HasFactory;
    protected $table='image';
    public $timestamps=false;

    public function question() {
        return $this->belongsTo(question::class);
    }

    public function reponse() {
        return $this->belongsTo(reponse::class);
    }
}
