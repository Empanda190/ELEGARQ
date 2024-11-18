<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    use HasFactory;
    protected $primaryKey = 'idserv';
    protected $fillable = ['idco','nombre','costo','Detalles','Unidad'];
}