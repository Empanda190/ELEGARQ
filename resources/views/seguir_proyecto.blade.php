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
            <div class="mb-3">
                <label for="numeroCotizacion" class="form-label">Número de Cotización</label>
                <input type="text" class="form-control" id="numeroCotizacion" placeholder="Teclear número de cotización">
            </div>

            <!-- Mostrar Detalles de la Cotización -->
            <div class="mb-3">
                <label for="detallesCotizacion" class="form-label">Detalles de la Cotización</label>
                <textarea class="form-control" id="detallesCotizacion" rows="3" placeholder="Mostrar detalles de la cotización" disabled></textarea>
            </div>

            <!-- Ingresar Fecha de Inicio -->
            <div class="mb-3">
                <label for="fechaInicio" class="form-label">Fecha de Inicio</label>
                <input type="date" class="form-control" id="fechaInicio">
            </div>

            <!-- Ingresar Fecha de Término -->
            <div class="mb-3">
                <label for="fechaTermino" class="form-label">Fecha de Término</label>
                <input type="date" class="form-control" id="fechaTermino">
            </div>

            <!-- Teclear Ubicación -->
            <div class="mb-3">
                <label for="ubicacion" class="form-label">Ubicación</label>
                <input type="text" class="form-control" id="ubicacion" placeholder="Teclear ubicación">
            </div>

            <!-- Botón Guardar -->
            <button type="submit" class="btn btn-primary">Guardar los Datos</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
