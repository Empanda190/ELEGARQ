<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Proyecto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Registrar Proyecto</h2>
        <form>
            <!-- Input Número de Cotización -->
            <tr>
                <td> Seleccione un número de cotización</td>
                <td><select  class="form-select" name = 'iddep'>
                @foreach($cotizacion as $cot)
                    <option value = '{{$cot->idcot}}'>{{$cot->idcot}}</option>
                @endforeach
	            </select>
	        </td></tr>

            <!-- Mostrar Detalles de la Cotización -->
            <div class="mb-3">
                <label for="detallesCotizacion" class="form-label">Detalles de la Cotización</label>
                <textarea class="form-control" name="detallesCotizacion" value='' rows="3" placeholder="Mostrar detalles de la cotización" disabled></textarea>
            </div>

            <!-- Ingresar Fecha de Inicio -->
            <tr>
            <td width=100>Fecha Inicio:</td>
            <td width=200>
            @if($errors->first('fecha_ini'))
                <p class="text-warning">{{$errors->first('fecha_ini')}}</p>
            @endif
            <input type = 'date' class="form-control" name='fecha_ini' placeholder= 'dd/mm/aaaa' value="{{old('fecha_ini')}}"></td>
            </tr>

            <!-- Ingresar Fecha de Término -->
            <tr>
            <td width=100>Fecha Termino:</td>
            <td width=200>
            @if($errors->first('fecha_fin'))
                <p class="text-warning">{{$errors->first('fecha_fin')}}</p>
            @endif
            <input type = 'date' class="form-control" name='fecha_fin' placeholder= 'dd/mm/aaaa' value="{{old('fecha_fin')}}"></td>
            </tr>

            <!-- Teclear Ubicación -->
            <tr>
            <td width=100>Ubicacion</td>
            <td width=200>
            @if($errors->first('Ubicacipn'))
                <p class="text-warning">{{$errors->first('Ubicacipn')}}</p>
            @endif
            <input type = 'text' class="form-control" name='Ubicacipn' placeholder= 'dd/mm/aaaa' value="{{old('Ubicacipn')}}"></td>
            </tr>

            <!-- Botón Guardar -->
            <button type="submit" class="btn btn-primary">Guardar los Datos</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>