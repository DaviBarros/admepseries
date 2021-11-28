<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Serie extends Model
{
    public $timestamps = false;
    protected $fillable = ['nome'] ;

    public function temporadas()
    {
    return $this->hasMany(related: Temporada::class);
    }
}
