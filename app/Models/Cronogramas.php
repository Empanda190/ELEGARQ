<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cronogramas extends Model
{
    use HasFactory;
    protected $primaryKey = ['idcot','idenc','idcro'];
    protected $fillable = ['idcot','idenc','idcro','actividad','fecha_inicio','fecha_ter','status'];
}