<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;
    protected $primaryKey = 'idenc';
    protected $fillable = ['idenc','nombre','apellidop','apellidom','telefono','correo','Clasificacion'];
}