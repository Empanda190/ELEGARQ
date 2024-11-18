<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat_Provs extends Model
{
    use HasFactory;
    protected $primaryKey = 'idpro';
    protected $fillable = ['idpro','empresa','nombre','apellidop','apellidom','telefono','correo'];
}