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
    public function registrar_proyecto(Request $request)
    {
        $cotizacion = \DB::select("SELECT idcot
        FROM cotizaciones
        WHERE idcot NOT IN (
            SELECT idcot
            FROM proyectos
        )");

        $numero = Cotizaciones::orderby('idcot', 'asc')->get();

        $idcot = $request->input('idcot');
       
        $rp = \DB::table('cotizaciones')
                    ->where('idcot', $idcot) 
                    ->select('idcot', 'idcli', 'fecha', 'vigencia', 'descripcion', 'total');
                    $rp = $rp->get();

        return view('registrar_proyecto')
                ->with('cotizacion',$cotizacion)
                ->with('numero',$numero)
                ->with('rp',$rp);
                
    }
    public function saveregisproy(Request $request)
    {
        /*$this->validate($request,[   
            'idcot'=>'required|numeric|integer',
			'fecha_ini'=>'required',
			'fecha_fin'=>'required',
            'Ubicacipn'=>'required',
        ]);*/

        $Proyectos = new Proyectos;
        $Proyectos ->idcot = $request->idcot;
        $Proyectos ->fecha_ini = $request->fecha_ini;
        $Proyectos ->fecha_fin = $request->fecha_fin;
        $Proyectos ->Ubicacipn = $request->Ubicacipn;
        $Proyectos ->save(); 

        Session::flash('mensaje', "La cotizacion número $request->idcot ha sido registrada dentro de proyectos");
        return redirect()->route('registrar_proyecto');

    }
    public function elaborar_cronograma()
    {
        $cotizacion = Proyectos::orderby('idcot', 'asc')
                                ->get();

        $encargado = Personals::orderby('idenc', 'asc')
                                ->get();

        $idultimocot = \DB::select("SELECT idcro + 1 AS nuevaclave FROM cronogramas ORDER BY idcro DESC LIMIT 1");

        $sigue = $idultimocot[0]->nuevaclave;

        return view('elaborar_cronograma')
                ->with('cotizacion',$cotizacion)
                ->with('encargado',$encargado)
                ->with('sigue',$sigue);
    }
    public function savecrono(Request $request)
    {
        $idcot = $request->input('idcot');
        $idenc = $request->input('idenc');
        $idcro = $request->input('idcro');
        $actividad = $request->input('actividad');
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_ter = $request->input('fecha_ter');
        $status = $request->input('status');

                // Insertar directamente en la base de datos
        \DB::insert('INSERT INTO cronogramas (idcot, idenc, idcro, actividad, fecha_inicio, fecha_ter, status) VALUES (?, ?, ?, ?, ?, ?, ?)', [
            $idcot,
            $idenc,
            $idcro,
            $actividad,
            $fecha_inicio,
            $fecha_ter,
            $status,
        ]);

        // Mensaje de éxito
        Session::flash('mensaje',"La actividad ha sido registrado exitosamente.");
        return redirect()->route('elaborar_cronograma'); // Redirigir a la ruta de pagos

    }
    public function seguir_proyecto(Request $request)
    {
        $proyecto = proyectos::orderby('idcot', 'asc')
                                ->get();

        $idcot = $request->input('idcot');
        $idcro = $request->input('idcro');
       
        $sp = \DB::table('cronogramas')
                    ->where('idcot', $idcot) 
                    ->select('idcot', 'idenc', 'idcro', 'actividad', 'fecha_inicio', 'fecha_ter', 'status');
                    $sp = $sp->get();

        return view('seguir_proyecto')
                ->with('proyecto',$proyecto)
                ->with('sp',$sp)
                ->with('idcro',$idcro);
    }
    public function completado($idcro)
    {
        $actualiza = \DB::update("UPDATE cronogramas
                            SET status ='completado' WHERE idcro = ?", [$idcro]);

        Session::flash("El estatus se ha actualizado");
        return redirect()->route('seguir_proyecto');
    }
    public function atrasado($idcro)
    {
        $actualiza = \DB::update("UPDATE cronogramas
                            SET status ='atrasado' WHERE idcro = ?", [$idcro]);

        Session::flash("El estatus se ha actualizado");
        return redirect()->route('seguir_proyecto');
    }

}