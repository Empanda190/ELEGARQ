<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
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
    public function registrar_proyecto()
    {
        $cotizacion = Cotizacions::orderby('idcot', 'asc')
                                ->get();

        return view('registrar_proyecto')
                ->with('cotizacion',$cotizacion);
    }
    public function saveregisproy(Request $request)
    {
        $this->validate($request,[   
            'ide'=>'required|numeric|integer',
			'fecha_ini'=>'required',
			'fecha_fin'=>'required',
            'Ubicacipn'=>'required',
        ]);

        $Proyectos = new Proyectos;
        $Proyectos ->idcot = $request->idcot;
        $Proyectos ->fecha_ini = $request->fecha_ini;
        $Proyectos ->fecha_fin = $request->fecha_fin;
        $Proyectos ->Ubicacipn = $request->Ubicacipn;

    }
    public function elaborar_cronograma()
    {
        $cotizacion = Cotizacions::orderby('idcot', 'asc')
                                ->get();

        return view('elaborar_cronograma')
                ->with('cotizacion',$cotizacion);
    }
}