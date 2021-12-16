<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Serie extends model {
    public $timestamps = false;
    protected $fillable = ['nome'];
}