<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Det_comp_mat extends Model
{
    use HasFactory;
    protected $primaryKey = ['idcomt','idcmt'];
    protected $fillable = ['idcomt','idcmt','costo','cant'];
}