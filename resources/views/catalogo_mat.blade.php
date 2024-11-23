@extends('principal')
@section('contenido')
<head>
<link rel="stylesheet" href="{{asset('http://localhost/elegarq/assets/css/bstyles.css')}}">
</head>

<body class=".body-catmat">
<section class=".catmat">
<div class="container mt-5">
    <h1 class="text-center mb-4">Catálogo de Materiales</h1>
    <div class="card shadow-sm p-4">
        @if ($materiales->isEmpty())
            <div class="text-center p-5">
                <h5 class="text-muted">Por el momento no tenemos materiales que mostrar.</h5>
                <p class="text-muted">¡Invitamos a agregar algunos!</p>
            </div>
        @else
            <div class="d-flex justify-content-between mb-3">
                <button class="btn btn-primary btn-sm" href="{{route('registro_mats')}}" id="btnAgregarMaterial">Agregar Material</button>
                <input type="text" class="form-control w-25" placeholder="Buscar..." id="buscarMaterial">
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Características</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($materiales as $material)
                            <tr>
                                <td>{{ $material->idcmt }}</td>
                                <td>
                                    <div class="img-container" style="width: 100px; height: 100px; display: flex; justify-content: center; align-items: center; overflow: hidden; margin: auto;">
                                        <img src="{{ $material->imagen }}" alt="Imagen Material" style="max-width: 100px;">
                                    </div>
                                </td>
                                <td>{{ $material->nombre }}</td>
                                <td>{{ $material->tipoMaterial->nombre ?? 'Sin tipo asignado' }}</td>
                                <td>{{ $material->caracteristicas }}</td>
                                <td>{{ $material->cantidad }}</td>
                                <td>${{ number_format($material->precio, 2) }}</td>
                                <td style="min-width: 100px;">
                                    <button class="btn btn-warning btn-sm">Editar</button>
                                    <button class="btn btn-danger btn-sm">Eliminar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
</section>
</body>
@stop