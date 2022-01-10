<?php

namespace App;

use App\Models\Temporada;
use Illuminate\Database\Eloquent\Model;

class Serie extends model {

    public $timestamps = false;
    
    protected $fillable = ['nome'];

    public function temporadas() {

        return $this -> hasMany(Temporada :: class);
    }
}