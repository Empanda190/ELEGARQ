<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra_Mat extends Model
{
    use HasFactory;
    protected $primaryKey = 'idcomt';
    protected $fillable = ['idcomt','fecha','total','idpro','Met_pago'];
}