<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    use HasFactory;

    protected $fillable = ['numero'];
    
    public $timestamps = false;

    public function episodios() {

        return $this -> hasMany(Episódio :: class);
    }

    public function series() {

        return $this -> belongsTo(Serie :: class);
    }
}
