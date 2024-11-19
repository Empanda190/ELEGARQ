<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Asignacions;
use App\Models\Cat_Mates;
use App\Models\Cat_Provs;
use App\Models\Clientes;
use App\Models\Compra_Mats;
use App\Models\Cot_Sers;
use App\Models\Cotizaciones;
use App\Models\Cronogramas;
use App\Models\Det_comp_mats;
use App\Models\Mat_Detalles;
use App\Models\Personals;
use App\Models\Proyectos;
use App\Models\Registro_Mats;
use App\Models\Registro_Pagos;
use App\Models\Servicios;
use App\Models\TipMats;

use Session;
class elegarqcontroller extends Controller
{
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
        $cotizacion = Cotizaciones::orderby('idcot', 'asc')
                                ->get();

        return view('registrar_proyecto')
                ->with('cotizacion',$cotizacion);
    }
    public function saveregisproy(Request $request)
    {
        $this->validate($request,[   
            'idcot'=>'required|numeric|integer',
			'fecha_ini'=>'required',
			'fecha_fin'=>'required',
            'Ubicacipn'=>'required',
        ]);

        $Proyectos = new Proyectos;
        $Proyectos ->idcot = $request->idcot;
        $Proyectos ->fecha_ini = $request->fecha_ini;
        $Proyectos ->fecha_fin = $request->fecha_fin;
        $Proyectos ->Ubicacipn = $request->Ubicacipn;
        $Proyectos ->save(); 

        Session::flash('mensaje', "La cotización con clave $request->idcot ha sido dado de alta como proyecto");
        return redirect()->route('registrar_proyecto');

    }
    public function elaborar_cronograma()
    {
        $cotizacion = Cotizaciones::orderby('idcot', 'asc')
                                ->get();

        $encargado = Personals::orderby('idenc', 'asc')
                                ->get();

        return view('elaborar_cronograma')
                ->with('cotizacion',$cotizacion)
                ->with('encargado',$encargado);
    }
    public function savecrono(Request $request)
    {
        $this->validate($request,[   
            'idcot'=>'required|numeric|integer',
			'actividad'=>'required',
			'fecha_inicio'=>'required',
            'fecha_ter'=>'required',
            'idenc'=>'required|numeric|integer',
        ]);

        $Cronogramas = new Cronogramas;
        $Cronogramas ->idcot = $request->idcot;
        $Cronogramas ->actividad = $request->actividad;
        $Cronogramas ->fecha_inicio = $request->fecha_inicio;
        $Cronogramas ->fecha_ter = $request->fecha_ter;
        $Cronogramas ->idenc = $request->idenc;
        $Cronogramas ->save(); 

        return response()->json([
            'message' => 'Cronograma guardado con éxito',
            'data' => $Cronogramas
        ], 201);

    }
    public function seguir_proyecto()
    {
        $cotizacion = Cotizaciones::orderby('idcot', 'asc')
                                ->get();

        return view('seguir_proyecto')
                ->with('cotizacion',$cotizacion);
    }

}