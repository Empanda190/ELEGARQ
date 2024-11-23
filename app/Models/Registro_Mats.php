<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro_Mats extends Model
{
    use HasFactory;

    protected $table = 'cat_mates'; // Nombre de la tabla
    protected $primaryKey = 'idcmt'; // Llave primaria

    protected $fillable = ['imagen', 'nombre', 'idtma', 'caracteristicas', 'cantidad', 'precio'];
}