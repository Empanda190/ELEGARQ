<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro_Mats extends Model
{
    use HasFactory;
    
    protected $table = 'registro_mats';
    public $timestamps = false;
    protected $fillable = ['idcot', 'idcmt', 'cant', 'precio'];
}