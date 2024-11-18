<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cot_Sers extends Model
{
    use HasFactory;
    protected $primaryKey = ['idcot','idserv'];
    protected $fillable = ['idcot','idserv','cant','costo'];
}