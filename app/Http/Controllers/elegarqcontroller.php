<?php
namespace App\Http\Controllers;
use App\Models\Asignacions;
use App\Models\Cat_Mates;
use App\Models\Cat_Provs;
use App\Models\Clientes;
use App\Models\Compra_Mats;
use App\Models\Cot_Sers;
use App\Models\Cotizacions;
use App\Models\Cronogramas;
use App\Models\Det_comp_mats;
use App\Models\Mat_Detalles;
use App\Models\Personals;
use App\Models\Proyectos;
use App\Models\Registro_Mats;
use App\Models\Registro_Pagos;
use App\Models\Servicios;
use App\Models\TipMats;

class elegarqcontroller extends Controller
{
    public function principalel()
    {
        return view ('principalel');
    }
    public function index()
    {
        return view ('index');
    }
    public function login()
    {
        return view ('login');
    }
}