<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipmats extends Model
{
    use HasFactory;
    protected $table = 'tipmats';
    protected $primaryKey = 'idtma';
    public $timestamps = false;
    protected $fillable = ['nombre'];
}