<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class question extends Model
{
    use HasFactory;
    protected $table='question';
    public $timestamps=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'enonce',
        'ordre',
        'type',
    ];

//    public function chapitre() {
//        return $this->belongsTo(chapite::class);
//    }


}
