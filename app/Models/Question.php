<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    /**
   * The attributes that are mass assignable.
   *
   * @var string[]
   */
    protected $fillable = [
        'pregunta',
        'respuestaUno',
        'respuestaDos',
        'respuestaTres',
        'respuestaCuatro',
        'respuestaCorrecta',
    ];
}
