<!-- Título: Proyecto despacho de arquitectos
Autor: Berenice Morales Bustamante  Grupo: 7A
Fecha de creación: 30 de noviembre del 2024 - 14:38 - 14::41
Última actualización: 30 de noviembre del 2024 - 17:09 - 17:32 -->

@extends('principal')
@section('contenido')

<div class="container">
    <h1>Asignar Material</h1>
    <!-- Mensaje éxito -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Felicidades:</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

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
        <div id="material-container" class="card shadow-sm p-4 mb-3">
            <div class="material-item">
                <!-- Selección del material -->
                <div class="form-group">
                    <label for="materiales[0]">Seleccionar Material:</label>
                    <select name="materiales[0]" class="form-control">
                        <option value="">-- Seleccionar --</option>
                        @foreach($materiales as $material)
                            <option value="{{ $material->idcmt }}">{{ $material->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Botón para eliminar un material agregado -->
                <button type="button" class="btn btn-danger remove-material">Eliminar</button>
            </div>
        </div>

        <!-- Botón para agregar más materiales -->
        <button type="button" id="add-material" class="btn btn-secondary" disabled>Agregar Material</button>

        <!-- Botón de guardar -->
        <button type="submit" class="btn btn-primary" id="save-button" disabled>Asignar Materiales</button>
    </form>
</div>

<!-- Script para manejar dinámicamente los materiales -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let materialIndex = 1; // Índice para los materiales
        const addMaterialButton = document.getElementById('add-material');
        const saveButton = document.getElementById('save-button');
        const projectSelect = document.getElementById('idcot');

        // Función para verificar si activar los botones
        function toggleButtons() {
            const projectSelected = projectSelect.value !== ''; // Verifica si se seleccionó un proyecto
            const materialSelected = [...document.querySelectorAll('.material-item select')]
                .some(select => select.value !== ''); // Verifica si algún material fue seleccionado

            // Activar o desactivar los botones según las condiciones
            addMaterialButton.disabled = !(projectSelected && materialSelected);
            saveButton.disabled = !(projectSelected && materialSelected);
        }

        // Escuchar cambios en el selector de proyectos
        projectSelect.addEventListener('change', toggleButtons);

        // Escuchar cambios en los selectores de materiales
        document.getElementById('material-container').addEventListener('change', function (e) {
            if (e.target.tagName === 'SELECT') {
                toggleButtons();
            }
        });

        // Agregar nuevo material
        addMaterialButton.addEventListener('click', function () {
            const container = document.getElementById('material-container');
            const newMaterial = document.querySelector('.material-item').cloneNode(true);

            // Actualizar los nombres y limpiar valores del nuevo material
            newMaterial.querySelectorAll('select, input').forEach(function (element) {
                const name = element.getAttribute('name');
                const newName = name.replace(/\[0\]/, `[${materialIndex}]`);
                element.setAttribute('name', newName);
                element.value = ''; // Limpiar valor del selector
            });

            container.appendChild(newMaterial);
            materialIndex++;

            // Escuchar cambios en el nuevo selector de material
            newMaterial.querySelector('select').addEventListener('change', toggleButtons);

            toggleButtons(); // Evaluar nuevamente después de agregar un material
        });

        // Eliminar material
        document.getElementById('material-container').addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-material')) {
                const item = e.target.closest('.material-item');
                if (document.querySelectorAll('.material-item').length > 1) {
                    item.remove();
                    toggleButtons(); // Evaluar nuevamente después de eliminar un material
                } else {
                    alert('Debe haber al menos un material.');
                }
            }
        });

        toggleButtons(); // Inicializar el estado de los botones al cargar la página
    });
</script>



@stop
