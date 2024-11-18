<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro_Mat extends Model
{
    use HasFactory;
    protected $primaryKey = 'idcot';
    protected $fillable = ['idcot','idcmt','cant','precio'];
}