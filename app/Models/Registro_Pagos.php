<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro_Pagos extends Model
{
    use HasFactory;
    protected $primaryKey = ['fecha','idcot'];
    protected $fillable = ['fecha','idcot','motivo','monto'];
}