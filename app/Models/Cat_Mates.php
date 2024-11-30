<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tipmats;

class Cat_Mates extends Model
{
    use HasFactory;
    
    protected $table = 'cat_mates';
    protected $primaryKey = 'idcmt';
    public $timestamps = false;
    protected $fillable = ['nombre', 'idtma', 'caracteristicas', 'cantidad', 'precio'];

    // Relación con Tipmat (Tipo de Material)
    public function tipmats()
    {
        return $this->belongsTo(tipmats::class, 'idtma', 'idtma');
    }
}
