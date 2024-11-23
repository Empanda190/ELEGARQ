@extends('principal')
@section('contenido')
<head>
<link rel="stylesheet" href="{{asset('http://localhost/elegarq/assets/css/bstyles.css')}}">
</head>

<body class=".body-catmat">
<section class=".catmat">
<form action="{{ route('guardar_mat') }}" method="POST">
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Registrar Nuevo Material</h4>
                </div>
                <div class="card-body">
                    <form>
                        <!-- Nombre del Material -->
                        <div class="form-group mb-3">
                            <label for="nombre" class="form-label">Nombre del Material</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del material" maxlength="30">
                        </div>

                        <!-- Imagen del Material -->
                        <div class="form-group mb-3">
                            <label for="imagen" class="form-label">URL de la Imagen</label>
                            <input type="text" class="form-control" id="imagen" name="imagen" placeholder="Ingrese la URL de la imagen">
                        </div>

                        <!-- Tipo de Material -->
                        <div class="form-group mb-3">
                            <label for="tipo" class="form-label">Tipo de Material</label>
                            <select class="form-select" id="tipo" name="idtma">
                                <option value="" disabled selected>Seleccione un tipo</option>
                                <!-- Aquí se deben cargar los tipos dinámicamente -->
                                <option value="1">Tipo 1</option>
                                <option value="2">Tipo 2</option>
                                <option value="3">Tipo 3</option>
                            </select>
                        </div>

                        <!-- Características -->
                        <div class="form-group mb-3">
                            <label for="caracteristicas" class="form-label">Características</label>
                            <textarea class="form-control" id="caracteristicas" name="caracteristicas" rows="3" maxlength="100" placeholder="Ingrese las características del material"></textarea>
                        </div>

                        <!-- Cantidad -->
                        <div class="form-group mb-3">
                            <label for="cantidad" class="form-label">Cantidad</label>
                            <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Ingrese la cantidad disponible" min="0">
                        </div>

                        <!-- Precio -->
                        <div class="form-group mb-3">
                            <label for="precio" class="form-label">Precio (MXN)</label>
                            <input type="number" class="form-control" id="precio" name="precio" placeholder="Ingrese el precio del material" min="0" step="0.01">
                        </div>

                        <!-- Botones -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success w-45">Guardar</button>
                            <button type="reset" class="btn btn-secondary w-45">Limpiar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</section>
</body>
@stop