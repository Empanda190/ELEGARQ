<?php

/*Título: Proyecto despacho de arquitectos
Autor: Berenice Morales Bustamante  Grupo: 7A
Fecha de creación: 17 de noviembre del 2024 - 21:48 - 22:08
Última actualización: 30 de noviembre del 2024 - 17:09 - 17:32*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro_Mats extends Model
{
    use HasFactory;
    protected $table = 'registro_mats';
    public $incrementing = false;
    protected $primaryKey = ['idcot', 'idcmt'];
    public $timestamps = false;
    protected $fillable = ['idcot', 'idcmt', 'cant', 'precio'];

    // Manejar claves primarias compuestas
    public function setKeysForSaveQuery($query)
    {
        return $query->where('idcot', $this->getAttribute('idcot'))
                     ->where('idcmt', $this->getAttribute('idcmt'));
    }
}