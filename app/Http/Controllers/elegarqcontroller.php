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
use App\Models\tipmats;
use Session;

class elegarqcontroller extends Controller
{
    public function index()
    {
        return view ('index');
    }




    /*Título: Proyecto despacho de arquitectos
    Autor: Berenice Morales Bustamante  Grupo: 7A
    Fecha de creación: 21 de noviembre del 2024 - 22:48 - 02:04
    Última actualización: 30 de noviembre del 2024 - 14:38 - 15:12*/

    //CATÁLOGO DE MATERIALES

    public function catalogo_mat()
    {
    // Consulta los materiales junto con su tipo de material (relación con tipmats)
    $materiales = Cat_Mates::with('tipmats')->get(); // Usar 'tipmats' en vez de 'tipmat'

    return view('catalogo_mat', compact('materiales'));
    }


    //Muestra la vista del formulario de registro de materiales
    public function registro_mats()
    {
    $tipmats = TipMats::all(); // Para el dropdown de tipos de materiales
    return view('registro_mats', compact('tipmats'));
    }

    //Metodo para guardar la informacion del formulario en la base de datos
    public function guardar_material(Request $request)
    {
    $request->validate([ //Para validar los datos antes de guardarlos
        'nombre' => 'required|string|max:30',
        'idtma' => 'required|exists:tipmats,idtma',
        'caracteristicas' => 'required|string|max:100',
        'cantidad' => 'required|integer|min:0',
        'precio' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
    ], [ //Para que no falte ningun dato por llenar
        'nombre.required' => 'El nombre del material es obligatorio.',
        'idtma.required' => 'Debe seleccionar un tipo de material.',
        'caracteristicas.required' => 'Las características son obligatorias.',
        'cantidad.required' => 'La cantidad es obligatoria.',
        'precio.required' => 'El precio es obligatorio.',
        'precio.regex' => 'El precio debe tener un máximo de dos decimales.'
    ]);

    try { //Muestra un mensaje de exito o de error
        Cat_Mates::create($request->all());
        return redirect()->route('registro_mats')->with('success', 'El material se registró correctamente.');
    } catch (\Exception $e) {
        return redirect()->route('registro_mats')->with('error', 'Ocurrió un error al registrar el material. Inténtelo nuevamente.');
    }
    }

    public function destroy($id)
    {
    // Buscar el material por su ID
    $material = Cat_Mates::findOrFail($id);

    // Eliminar el material
    $material->delete();

    // Agregar mensaje de éxito en la sesión
    session()->flash('success', 'El material ha sido eliminado exitosamente.');

    // Redirigir de vuelta a la vista de catálogo
    return redirect()->route('catalogo_mat');
    }

    public function editarmaterial($idcmt)
    {
        $material = Cat_Mates::findOrFail($idcmt); // Busca el material por su id
        $tipmats = tipmats::all(); // Obtén todos los tipos de materiales para el dropdown
        return view('editarmaterial', compact('material', 'tipmats'));
    }

    public function update(Request $request, $idcmt)
    {
        $request->validate([
            'nombre' => 'required|max:30',
            'idtma' => 'required|exists:tipmats,idtma',
            'caracteristicas' => 'required|max:100',
            'cantidad' => 'required|integer',
            'precio' => 'required|numeric|min:0',
        ]);

        $material = Cat_Mates::findOrFail($idcmt);
        $material->update($request->all());

        return redirect()->route('catalogo_mat')->with('success', 'Material actualizado correctamente');
    }

    //ASIGNACION DE MATERIALES

    // Mostrar la lista de proyectos y materiales
    public function asignar_material()
    {
        $proyectos = Proyectos::all(); // Obtener todos los proyectos
        $materiales = Cat_Mates::all(); // Obtener todos los materiales
        return view('asignar_material', compact('proyectos', 'materiales'));
    }

    // Guardar asignación de materiales
    public function guardar_asignacion(Request $request)
    {
        $validated = $request->validate([
            'idcot' => 'required|exists:proyectos,idcot',
            'materiales' => 'required|array',
            'materiales.*.idcmt' => 'required|exists:cat_mates,idcmt',
            'materiales.*.cant' => 'required|integer|min:1',
            'materiales.*.precio' => 'required|numeric|min:0',
        ]);

        foreach ($validated['materiales'] as $material) {
            // Insertar solo si no existe esta combinación
            Registro_Mats::updateOrCreate(
                ['idcot' => $validated['idcot'], 'idcmt' => $material['idcmt']],
                ['cant' => $material['cant'], 'precio' => $material['precio']]
            );
        }

        return redirect()->back()->with('success', 'Materiales asignados correctamente.');
    }
}