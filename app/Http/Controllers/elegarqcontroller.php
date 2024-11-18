<?php
namespace App\Http\Controllers;
use App\Models\Asignacion;
use App\Models\Cat_Mate;
use App\Models\Cat_Prov;
use App\Models\Clientes;
use App\Models\Compra_Mat;
use App\Models\Cot_Ser;
use App\Models\Cotizacion;
use App\Models\Cronogramas;
use App\Models\Det_comp_mat;
use App\Models\Mat_Detalles;
use App\Models\Personal;
use App\Models\Proyectos;
use App\Models\Registro_Mat;
use App\Models\Registro_Pagos;
use App\Models\Servicios;
use App\Models\TipMat;

class elegarqcontroller extends Controller
{
    public function principalel()
    {
        return view ('principalel');
    }
}