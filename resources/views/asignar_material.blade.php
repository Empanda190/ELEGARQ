<!-- Título: Proyecto despacho de arquitectos
Autor: Berenice Morales Bustamante  Grupo: 7A
Fecha de creación: 30 de noviembre del 2024 - 14:38 - 14::41
Última actualización: 27 de noviembre del 2024 - 14:38 - 15:12 -->

@extends('principal')
@section('contenido')
<div class="container">
    <h1>Asignar Material</h1>
    <form action="{{ route('guardar_asignacion') }}" method="POST">
        @csrf
        <!-- Selección del proyecto -->
        <div class="form-group">
            <label for="idcot">Seleccionar Proyecto:</label>
            <select name="idcot" id="idcot" class="form-control">
                <option value="">-- Seleccionar --</option>
                @foreach($proyectos as $proyecto)
                    <option value="{{ $proyecto->idcot }}">{{ $proyecto->idcot }}</option>
                @endforeach
            </select>
        </div>

        <!-- Contenedor dinámico para materiales -->
        <div id="material-container">
            <div class="material-item">
                <!-- Selección del material -->
                <div class="form-group">
                    <label for="materiales[0][idcmt]">Seleccionar Material:</label>
                    <select name="materiales[0][idcmt]" class="form-control">
                        <option value="">-- Seleccionar --</option>
                        @foreach($materiales as $material)
                            <option value="{{ $material->idcmt }}">{{ $material->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Cantidad -->
                <div class="form-group">
                    <label for="materiales[0][cant]">Cantidad:</label>
                    <input type="number" name="materiales[0][cant]" class="form-control" min="1" required>
                </div>

                <!-- Precio -->
                <div class="form-group">
                    <label for="materiales[0][precio]">Precio:</label>
                    <input type="number" name="materiales[0][precio]" class="form-control" step="0.01" required>
                </div>

                <button type="button" class="btn btn-danger remove-material">Eliminar</button>
            </div>
        </div>

        <!-- Botón para agregar más materiales -->
        <button type="button" id="add-material" class="btn btn-secondary">Agregar Material</button>

        <!-- Botón de guardar -->
        <button type="submit" class="btn btn-primary">Asignar Materiales</button>
    </form>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
</div>

<!-- Script para manejar dinámicamente los materiales -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let materialIndex = 1; // Índice para los materiales

        document.getElementById('add-material').addEventListener('click', function() {
            const container = document.getElementById('material-container');
            const newMaterial = document.querySelector('.material-item').cloneNode(true);

            // Actualizar los nombres y IDs del nuevo material
            newMaterial.querySelectorAll('select, input').forEach(function(element) {
                const name = element.getAttribute('name');
                const newName = name.replace(/\[0\]/, `[${materialIndex}]`);
                element.setAttribute('name', newName);
                element.value = ''; // Limpiar el valor
            });

            container.appendChild(newMaterial);
            materialIndex++;
        });

        // Eliminar material
        document.getElementById('material-container').addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-material')) {
                const item = e.target.closest('.material-item');
                if (document.querySelectorAll('.material-item').length > 1) {
                    item.remove();
                } else {
                    alert('Debe haber al menos un material.');
                }
            }
        });
    });
</script>
@stop
