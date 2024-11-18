<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;
    protected $primaryKey = 'idcot';
    protected $fillable = ['idcot','idcli','fecha','vigencia','descripcion','total'];
}