<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyectos extends Model
{
    use HasFactory;
    protected $primaryKey = 'idcot';
    protected $fillable = ['idcot','fecha_ini','fecha_fin','Ubicacipn'];
}