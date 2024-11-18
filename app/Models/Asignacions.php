<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignacions extends Model
{
    use HasFactory;
    protected $primaryKey = ['idcot','idenc'];
    protected $fillable = ['idcot','idenc'];
}