<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat_Mates extends Model
{
    use HasFactory;
    
    protected $table = 'cat_mates';
    protected $fillable = ['nombre', 'idtma', 'caracteristicas', 'cantidad', 'precio'];

    public function tipmat()
    {
        return $this->belongsTo(Tipmat::class, 'idtma');
    }
}