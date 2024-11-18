<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elaborar Cronograma</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Elaborar Cronograma</h2>
        <form>
            <!-- Seleccionar Proyecto -->
            <tr>
                <td> Seleccione un número de proyecto</td>
                <td><select  class="form-select" name = 'iddep'>
                @foreach($cotizacion as $cot)
                    <option value = '{{$cot->idcot}}'>{{$cot->idcot}}</option>
                @endforeach
	            </select>
	        </td></tr>

            <!-- Asignar Actividades -->
            <div class="mb-3">
                <label for="asignarActividades" class="form-label">Asignar Actividades</label>
                <textarea class="form-control" id="asignarActividades" rows="3" placeholder="Escribe las actividades"></textarea>
            </div>

            <!-- Establecer Fechas -->
            <div class="mb-3">
                <label for="fechaInicioActividad" class="form-label">Fecha de Inicio</label>
                <input type="date" class="form-control" id="fechaInicioActividad">
            </div>
            <div class="mb-3">
                <label for="fechaFinActividad" class="form-label">Fecha de Fin</label>
                <input type="date" class="form-control" id="fechaFinActividad">
            </div>

            <!-- Asignar Personal para Actividades -->
            <div class="mb-3">
                <label for="asignarPersonal" class="form-label">Asignar Personal</label>
                <input type="text" class="form-control" id="asignarPersonal" placeholder="Nombre del personal asignado">
            </div>

            <!-- Botón Guardar -->
            <button type="submit" class="btn btn-primary">Guardar Información</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>