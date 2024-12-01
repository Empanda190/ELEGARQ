<!-- Título: Proyecto despacho de arquitectos
Autor: Berenice Morales Bustamante  Grupo: 7A
Fecha de creación: 21 de noviembre del 2024 - 22:48 - 02:04
Última actualización: 27 de noviembre del 2024 - 8:53 - 01:33 -->

@extends('principal')
@section('contenido')

<div class="container mt-5">
    <h1 class="text-center mb-4">Catálogo de Materiales</h1>
    <!-- Mensaje de éxito (si hay un mensaje en la sesión) -->
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <!-- Mensajes de advertencia -->
    @if (session('warnings'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Advertencia:</strong>
            <ul>
                @foreach (session('warnings') as $warning)
                    <li>{{ $warning }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    <div class="card shadow-sm p-4">
        @if ($materiales->isEmpty())
            <div class="text-center p-5">
                <h5 class="text-muted">Por el momento no tenemos materiales que mostrar.</h5>
                <p class="text-muted">¡Invitamos a agregar algunos!</p>
            </div>
        @else
            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('registro_mats') }}" class="btn btn-primary btn-sm" id="btnAgregarMaterial">Agregar Material</a>
                <input type="text" class="form-control w-25" placeholder="Buscar..." id="buscarMaterial">
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <thead class="table-dark" style="background-color: #343a40">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Características</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th style="width: 100px;">Acciones</th> <!-- Ancho fijo para la columna de acciones -->
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Genera una fila por cada material en la BD -->
                        @foreach ($materiales as $material)
                            <tr>
                                <td>{{ $material->idcmt }}</td>
                                <td>{{ $material->nombre }}</td>
                                <td>{{ $material->tipmats->nombre ?? 'N/A' }}</td> <!-- Muestra el nombre del tipo de material -->
                                <td>{{ $material->caracteristicas }}</td>
                                <td>{{ $material->cantidad }}</td>
                                <td>${{ number_format($material->precio, 2) }}</td>
                                <td class="align-middle" style="white-space: nowrap;">
                                    <!-- Botón para Editar con ícono -->
                                    <a href="{{ route('editarmaterial', $material->idcmt) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> <!-- Icono de edición -->
                                    </a>
                                    
                                    <!-- Botón para Eliminar con ícono -->
                                    <!-- Formulario de eliminación -->
                                    <form action="{{ route('eliminar_material', $material->idcmt) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i> <!-- Icono de eliminación -->
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>

@stop




