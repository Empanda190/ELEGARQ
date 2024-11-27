<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asignacions;
// Se incluyen los modelos correspondientes a las tablas involucradas
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
//JAVIER
class elegarqcontroller extends Controller
{
    // Método para mostrar la página de inicio
    public function index()
    {
        return view('index');
    }

    // Método para registrar un nuevo proyecto
    public function registrar_proyecto(Request $request)
    {
        // Consulta para obtener las cotizaciones que no están asignadas a proyectos
        $cotizacion = \DB::select("SELECT idcot FROM cotizaciones WHERE idcot NOT IN (SELECT idcot FROM proyectos)");

        // Obtener todas las cotizaciones ordenadas por ID
        $numero = Cotizaciones::orderby('idcot', 'asc')->get();

        // Obtener el ID de cotización enviado desde el formulario
        $idcot = $request->input('idcot');

        // Consultar detalles de la cotización seleccionada
        $rp = \DB::table('cotizaciones')
                ->where('idcot', $idcot)
                ->select('idcot', 'idcli', 'fecha', 'vigencia', 'descripcion', 'total')
                ->get();

        // Retornar vista con los datos necesarios
        return view('registrar_proyecto')
                ->with('cotizacion', $cotizacion)
                ->with('numero', $numero)
                ->with('rp', $rp);
    }

    // Método para guardar un nuevo proyecto en la base de datos
    public function saveregisproy(Request $request)
    {
        // Crear una nueva instancia del modelo Proyectos
        $Proyectos = new Proyectos;
        $Proyectos->idcot = $request->idcot;
        $Proyectos->fecha_ini = $request->fecha_ini;
        $Proyectos->fecha_fin = $request->fecha_fin;
        $Proyectos->Ubicacipn = $request->Ubicacipn;
        $Proyectos->save(); // Guardar en la base de datos

        // Mostrar mensaje de éxito
        Session::flash('mensaje', "La cotización número $request->idcot ha sido registrada dentro de proyectos");

        // Redirigir a la vista de registrar proyecto
        return redirect()->route('registrar_proyecto');
    }

    // Método para mostrar la vista de elaboración de cronograma
    public function elaborar_cronograma()
    {
        // Obtener los proyectos y encargados disponibles
        $cotizacion = Proyectos::orderby('idcot', 'asc')->get();
        $encargado = Personals::orderby('idenc', 'asc')->get();

        // Calcular el siguiente ID de cronograma
        $idultimocot = \DB::select("SELECT idcro + 1 AS nuevaclave FROM cronogramas ORDER BY idcro DESC LIMIT 1");
        $sigue = $idultimocot[0]->nuevaclave;

        // Retornar vista con los datos necesarios
        return view('elaborar_cronograma')
                ->with('cotizacion', $cotizacion)
                ->with('encargado', $encargado)
                ->with('sigue', $sigue);
    }

    // Método para guardar un cronograma en la base de datos
    public function savecrono(Request $request)
    {
        // Insertar un nuevo cronograma directamente en la base de datos
        \DB::insert('INSERT INTO cronogramas (idcot, idenc, idcro, actividad, fecha_inicio, fecha_ter, status) VALUES (?, ?, ?, ?, ?, ?, ?)', [
            $request->input('idcot'),
            $request->input('idenc'),
            $request->input('idcro'),
            $request->input('actividad'),
            $request->input('fecha_inicio'),
            $request->input('fecha_ter'),
            $request->input('status'),
        ]);

        // Mostrar mensaje de éxito
        Session::flash('mensaje', "La actividad ha sido registrada exitosamente.");

        // Redirigir a la vista de elaborar cronograma
        return redirect()->route('elaborar_cronograma');
    }

    // Método para mostrar los cronogramas de un proyecto
    public function seguir_proyecto(Request $request)
    {
        // Obtener todos los proyectos
        $proyecto = Proyectos::orderby('idcot', 'asc')->get();

        // Filtrar cronogramas por ID de proyecto
        $idcot = $request->input('idcot');
        $idcro = $request->input('idcro');
        $sp = \DB::table('cronogramas')
                ->where('idcot', $idcot)
                ->select('idcot', 'idenc', 'idcro', 'actividad', 'fecha_inicio', 'fecha_ter', 'status')
                ->get();

        // Retornar vista con los datos necesarios
        return view('seguir_proyecto')
                ->with('proyecto', $proyecto)
                ->with('sp', $sp)
                ->with('idcro', $idcro);
    }

    // Método para actualizar el estado de un cronograma a "completado"
    public function completado($idcro)
    {
        \DB::update("UPDATE cronogramas SET status = 'completado' WHERE idcro = ?", [$idcro]);

        Session::flash('mensaje', "El estatus se ha actualizado");
        return redirect()->route('seguir_proyecto');
    }

    // Método para actualizar el estado de un cronograma a "atrasado"
    public function atrasado($idcro)
    {
        \DB::update("UPDATE cronogramas SET status = 'atrasado' WHERE idcro = ?", [$idcro]);

        Session::flash('mensaje', "El estatus se ha actualizado");
        return redirect()->route('seguir_proyecto');
    }
//JAVIER
}
