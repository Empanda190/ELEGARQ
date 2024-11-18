<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mat_Detalles extends Model
{
    use HasFactory;
    protected $primaryKey = ['idcmt','idpro'];
    protected $fillable = ['idcmt','idpro','costo'];
}