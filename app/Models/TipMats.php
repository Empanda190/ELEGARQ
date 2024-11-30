<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipmats extends Model
{
    use HasFactory;
    
    protected $table = 'tipmats';
    public $timestamps = false;
    protected $fillable = ['nombre'];

    public function catMates()
    {
        return $this->hasMany(CatMate::class, 'idtma');
    }
}