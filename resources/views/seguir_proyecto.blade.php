<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seguir Proyecto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Seguir Proyecto</h2>
        <form>
            <!-- Seleccionar Proyecto -->
            <tr>
                <td> Seleccione un número de cotización</td>
                <td><select  class="form-select" name = 'iddep'>
                @foreach($cotizacion as $cot)
                    <option value = '{{$cot->idcot}}'>{{$cot->idcot}}</option>
                @endforeach
	            </select>
	        </td></tr>

            <!-- Mostrar Cronograma -->
            <div class="mb-3">
                <label for="mostrarCronograma" class="form-label">Cronograma</label>
                <textarea class="form-control" id="mostrarCronograma" rows="5" placeholder="Mostrar cronograma" disabled></textarea>
            </div>

            <!-- Actualizar Estatus de Actividades -->
            <div class="mb-3">
                <label for="estatusActividades" class="form-label">Actualizar Estatus de Actividades</label>
                <input type="text" class="form-control" id="estatusActividades" placeholder="Escribe el estatus de las actividades">
            </div>

            <!-- Botón Guardar -->
            <button type="submit" class="btn btn-primary">Guardar Información</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
