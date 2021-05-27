<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chapitre extends Model
{
    use HasFactory;
    protected $table='chapitre';
    public $timestamps=false;

    public function question() {
        return $this->hasMany(question::class);
    }



}
