@extends("templete")
<div class="container justify-content-center">
    <h4 class="mb-4 m-3 text-center titulo">Solicitudes de Viáticos</h4>
</div>
<div class="container d-flex justify-content-end">
    <button class="btn btn-secondary btn-sm m-2" data-bs-toggle="modal" data-bs-target="#nueva_solicitud">Nueva</button>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Solicitante</th>
                                <th>Concepto</th>
                                <th>Motivo</th>
                                <th>Descripción</th>
                                <th class="text-center">Costo Estimado</th>
                                <th class="text-center">Esatus</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($solicitudes as $solicitud)
                                <tr>
                                    <td>{{$solicitud->solicitud_fecha}}</td>
                                    <td>{{$solicitud->nombre_solicitante}}</td>
                                    <td>{{$solicitud->concepto_nombre}}</td>
                                    <td>{{$solicitud->motivo_nombre}}</td>
                                    <td>{{$solicitud->solicitud_descripcion}}</td>
                                    <td align="right">$ {{number_format($solicitud->solicitud_costo_estimado, 2)}}</td>
                                    <td>{{$solicitud->estatus_nombre}}</td>
                                    <td><a href="/solicitud-detalles/{{$solicitud->id_solicitud}}"
                                            class="link-secondary"><b>Ver Detalles</b></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal-lg" id="nueva_solicitud" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/nueva-solicitud" id="formSolicitud" method="post" onsubmit="enviarSolicitud(event)">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Solicitud</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <input id="id_user" name="id_user" type="hidden" value="{{$id_user}}" />
                            <label for="id_motivo">Motivo</label>
                            <select name="id_motivo" id="contenedor_select_motivos" class="form-select">
                                <option value="">Seleccionar</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="id_concepto">Concepto</label>
                            <select name="id_concepto" id="contenedor_select_conceptos" class="form-select">
                                <option value="">Seleccionar</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="solicitud_costo_estimado">Costo Estimado</label>
                            <input type="text" name="solicitud_costo_estimado" id="solicitud_costo_estimado"
                                class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="solicitud_descripcion">Descripción</label>
                            <textarea name="solicitud_descripcion" id="solicitud_descripcion"
                                class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    async function enviarSolicitud(event) {
        event.preventDefault();

        const form = event.target;
        const formData = new FormData(form);

        // Mostrar loader
        Swal.fire({
            title: 'Procesando',
            html: 'Por favor espere...',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        try {
            const response = await fetch("/nueva-solicitud", {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            });

            const data = await response.json();

            Swal.fire({
                icon: data.success ? 'success' : 'error',
                title: data.success ? '¡Éxito!' : 'Error',
                text: data.message,
                timer: data.success ? 3000 : null,
                showConfirmButton: !data.success
            });

            if (data.success) {
                setTimeout(() => {
                    window.location.reload();
                }, 3000);
            }

        } catch (error) {
            Swal.fire({
                icon: 'error',
                title: 'Error de conexión',
                text: 'No se pudo conectar con el servidor'
            });
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        const selectPrincipal = document.getElementById('contenedor_select_conceptos');

        // Función para cargar las opciones
        async function cargarOpciones() {
            try {
                const response = await fetch('/select-conceptos');
                const html = await response.text();

                // Crear un elemento temporal para parsear el HTML
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = html;

                // Obtener todas las opciones
                const opciones = tempDiv.querySelectorAll('option');

                // Limpiar select principal (excepto la primera opción)
                while (selectPrincipal.options.length > 1) {
                    selectPrincipal.remove(1);
                }

                // Agregar las nuevas opciones
                opciones.forEach(opcion => {
                    selectPrincipal.appendChild(opcion.cloneNode(true));
                });

            } catch (error) {
                console.error('Error al cargar las opciones:', error);
                // Opcional: Mostrar mensaje de error al usuario
            }
        }

        // Cargar las opciones al inicio
        cargarOpciones();

        const selectMotivos = document.getElementById('contenedor_select_motivos');

        // Función para cargar las opciones
        async function cargarOpcionesMotivos() {
            try {
                const response = await fetch('/select-motivos');
                const html = await response.text();

                // Crear un elemento temporal para parsear el HTML
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = html;

                // Obtener todas las opciones
                const opciones = tempDiv.querySelectorAll('option');

                // Limpiar select principal (excepto la primera opción)
                while (selectMotivos.options.length > 1) {
                    selectMotivos.remove(1);
                }

                // Agregar las nuevas opciones
                opciones.forEach(opcion => {
                    selectMotivos.appendChild(opcion.cloneNode(true));
                });

            } catch (error) {
                console.error('Error al cargar las opciones:', error);
                // Opcional: Mostrar mensaje de error al usuario
            }
        }

        // Cargar las opciones al inicio
        cargarOpcionesMotivos();

    });
</script>