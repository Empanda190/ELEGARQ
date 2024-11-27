@extends('principal')
@section('contenido')

<div class="container">
    <h2>Registrar Material</h2>
    <form action="{{ route('guardar_material') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" maxlength="30" value="{{ old('nombre') }}">
            @error('nombre')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="idtma" class="form-label">Tipo de Material</label>
            <select name="idtma" id="idtma" class="form-select">
                <option value="">Seleccione un tipo</option>
                @foreach($tipmats as $tipmat)
                    <option value="{{ $tipmat->idtma }}">{{ $tipmat->nombre }}</option>
                @endforeach
            </select>
            @error('idtma')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="caracteristicas" class="form-label">Características</label>
            <input type="text" name="caracteristicas" id="caracteristicas" class="form-control" maxlength="100" value="{{ old('caracteristicas') }}">
            @error('caracteristicas')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control" value="{{ old('cantidad') }}">
            @error('cantidad')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="text" name="precio" id="precio" class="form-control" value="{{ old('precio') }}">
            @error('precio')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</div>

@stop