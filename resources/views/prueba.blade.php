<!-- Título: Proyecto despacho de arquitectos
Autor: Berenice Morales Bustamante  Grupo: 7A
Fecha de creación: 21 de noviembre del 2024 - 22:48 - 02:04
Última actualización: 27 de noviembre del 2024 - 20:12 - 01:23 -->

@extends('principal')
@section('contenido')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Editar Material</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('actualizar_material', $material->idcmt) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" maxlength="30" 
                                   value="{{ old('nombre', $material->nombre) }}" required>
                            @error('nombre')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="idtma" class="form-label">Tipo de Material</label>
                            <select name="idtma" id="idtma" class="form-select" required>
                                <option value="">Seleccione un tipo</option>
                                @foreach($tipmats as $tipmat)
                                    <option value="{{ $tipmat->idtma }}" 
                                        {{ old('idtma', $material->idtma) == $tipmat->idtma ? 'selected' : '' }}>
                                        {{ $tipmat->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idtma')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="caracteristicas" class="form-label">Características</label>
                            <input type="text" name="caracteristicas" id="caracteristicas" class="form-control" maxlength="100" 
                                   value="{{ old('caracteristicas', $material->caracteristicas) }}" required>
                            @error('caracteristicas')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="cantidad" class="form-label">Cantidad</label>
                                <input type="number" name="cantidad" id="cantidad" class="form-control" 
                                       value="{{ old('cantidad', $material->cantidad) }}" required>
                                @error('cantidad')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="precio" class="form-label">Precio</label>
                                <input type="text" name="precio" id="precio" class="form-control" 
                                       value="{{ old('precio', $material->precio) }}" required
                                       oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                @error('precio')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('catalogo_mat') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-success w-45">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
