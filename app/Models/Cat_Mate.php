<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat_Mate extends Model
{
    use HasFactory;
    protected $primaryKey = 'idcmt';
    protected $fillable = ['idcmt','nombre','idtma','caracteristicas','cantidad','precio'];
}