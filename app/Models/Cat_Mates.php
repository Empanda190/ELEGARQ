<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat_Mates extends Model
{
    use HasFactory;
    protected $table = 'cat_mates';
    protected $primaryKey = 'idcmt';
    public $timestamps = false;
    protected $fillable = ['imagen','nombre','idtma','caracteristicas','cantidad','precio'];

    // Relación con la tabla tipmats
    public function TipMats()
    {
        return $this->belongsTo(TipMats::class, 'idtma', 'idtma');
    }
}