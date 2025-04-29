@extends("templete")
<style>
    .hidden {
        display: none;
    }
</style>
<div class="container justify-content-center">
    <h4 class="mb-2 m-3 text-center titulo">Detalles de Solicitud</h4>
</div>
<div class="container d-flex justify-content-end">
    <button class="btn btn-secondary btn-sm m-2" data-bs-toggle="modal"
        data-bs-target="#exampleModal_cotizacion">Cotizar</button>
    <a href="/ver-depositos/{{$solicitud->id_solicitud}}" class="btn btn-secondary btn-sm m-2">Depósitos</a>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col"><b>Folio</b></div>
                                <div class="col">{{$solicitud->id_solicitud}}</div>
                            </div>
                            <div class="row">
                                <div class="col"><b>Solicitante</b></div>
                                <div class="col">{{$solicitud->nombre_solicitante}}</div>
                            </div>
                            <div class="row">
                                <div class="col"><b>Fecha Nacimiento</b></div>
                                <div class="col">{{$solicitud->fecha_nacimiento}}</div>
                            </div>
                            <div class="row">
                                <div class="col"><b>Concepto</b></div>
                                <div class="col">{{$solicitud->concepto_nombre}}</div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col"><b>Marca</b></div>
                                <div class="col">{{$solicitud->nombre_empresa}}</div>
                            </div>
                            <div class="row">
                                <div class="col"><b>Sede</b></div>
                                <div class="col">{{$solicitud->nombre_sede}}</div>
                            </div>
                            <div class="row">
                                <div class="col"><b>Área</b></div>
                                <div class="col">{{$solicitud->nombre_area}}</div>
                            </div>
                            <div class="row">
                                <div class="col"><b>Puesto</b></div>
                                <div class="col">{{$solicitud->nombre_puesto}}</div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col"><b>Monto Solicitado</b></div>
                                <div class="col">$ {{number_format($solicitud->solicitud_costo_estimado, 2)}}</div>
                            </div>
                            <div class="row">
                                <div class="col"><b>Monto Depositado</b></div>
                                <div class="col">$ {{number_format($monto_depositado, 2)}}</div>
                            </div>
                            <div class="row">
                                <div class="col"><b>Gasto Cotizado</b></div>
                                <div class="col">$ {{number_format($gasto_cotizado, 2)}}</div>
                            </div>
                            <div class="row">
                                <div class="col"><b>Gasto Comprobado</b></div>
                                <div class="col">$ {{number_format($gasto_real->monto, 2)}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col"><b>Motivo</b></div>
                        <div class="col-10">{{$solicitud->motivo_nombre}}</div>
                    </div>
                    <div class="row">
                        <div class="col"><b>Descripción</b></div>
                        <div class="col-10">{{$solicitud->solicitud_descripcion}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container justify-content-center">
    <h4 class="mb-2 m-3 text-center titulo">Cotizaciones</h4>
</div>
<div class="container justify-content-center" id="cotizaciones">
</div>

<div class="modal fade modal-lg" id="exampleModal_cotizacion" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/nueva-cotizacion" method="post" onsubmit="enviarCotizacion(event)">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Cotización</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <input type="hidden" id="id_solicitud" name="id_solicitud"
                                value="{{$solicitud->id_solicitud}}">
                            <label for="">Tipo</label>
                            <select name="id_cotizacion_tipo" id="contenedor_select_cotizacion_tipos"
                                class="form-select">
                                <option value="">Seleccionar</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="cotizacion_costo">Costo</label>
                            <input type="text" name="cotizacion_costo" id="cotizacion_costo" class="form-control">
                        </div>
                        <div class="col hidden_otros" id="fecha_oculta">
                            <label for="cotizacion_fecha_otros">Fecha</label>
                            <input type="date" name="cotizacion_fecha_otros" id="cotizacion_fecha_otros"
                                class="form-control">
                        </div>
                        <div class="col">
                            <label for="cotizacion_destino">Destino</label>
                            <input type="text" name="cotizacion_destino" id="cotizacion_destino" class="form-control">
                        </div>
                    </div>
                    <div id="inputsOcultos" class="hidden">
                        <div class="row">
                            <div class="col">
                                <label for="">Aerolínea</label>
                                <select name="id_aerolinea" id="contenedor_select_aerolineas" class="form-select">
                                    <option value="" disabled selected>Seleccionar</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="cotizacion_clave_reservacion">Clave Reservación</label>
                                <input type="text" name="cotizacion_clave_reservacion" id="cotizacion_clave_reservacion"
                                    class="form-control">
                            </div>
                            <div class="col">
                                <label for="cotizacion_ruta">Ruta</label>
                                <input type="text" name="cotizacion_ruta" id="cotizacion_ruta" class="form-control">
                            </div>
                            <div class="col">
                                <label for="cotizacion_fecha_compra">Fecha Compra</label>
                                <input type="date" name="cotizacion_fecha_compra" id="cotizacion_fecha_compra"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="cotizacion_fecha_inicio">Fecha Viaje</label>
                                <input type="date" name="cotizacion_fecha_inicio" id="cotizacion_fecha_inicio"
                                    class="form-control">
                            </div>
                            <div class="col">
                                <label for="cotizacion_hora_inicio">Hora Viaje</label>
                                <input type="time" name="cotizacion_hora_inicio" id="cotizacion_hora_inicio"
                                    class="form-control">
                            </div>
                            <div class="col">
                                <label for="cotizacion_fecha_fin">Fecha Regreso</label>
                                <input type="date" name="cotizacion_fecha_fin" id="cotizacion_fecha_fin"
                                    class="form-control">
                            </div>
                            <div class="col">
                                <label for="cotizacion_hora_fin">Hora Regreso</label>
                                <input type="time" name="cotizacion_hora_fin" id="cotizacion_hora_fin"
                                    class="form-control">
                            </div>
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
<div class="modal fade" id="exampleModal_gasto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/nuevo-comprobante" method="post" enctype="multipart/form-data"
                onsubmit="enviarComprobante(event)">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Comprobar Gasto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <input type="hidden" name="id_cotizacion" id="inputIdCotizacion" value="">
                            <label for="comprobante_gasto_monto">Monto</label>
                            <input type="text" name="comprobante_gasto_monto" id="comprobante_gasto_monto"
                                class="form-control">
                        </div>
                        <div class="col">
                            <label for="comprobante_gasto_monto_deducible">Deducible</label>
                            <input type="text" name="comprobante_gasto_monto_deducible"
                                id="comprobante_gasto_monto_deducible" class="form-control">
                        </div>
                        <div class="col">
                            <input class="form-check-input" type="checkbox" name="comprobante_gasto_factura"
                                id="comprobante_gasto_factura" checked>
                            <label class="form-check-label" for="comprobante_gasto_factura">
                                Es Factura
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="comprobante_gasto_observaciones">Observaciones</label>
                            <textarea name="comprobante_gasto_observaciones" id="comprobante_gasto_observaciones"
                                class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <label for="archivo">Subir archivo</label>
                        <div class="col">
                            <input type="file" name="archivo" id="archivo" class="form-control">
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
    async function enviarCotizacion(event) {
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
            const response = await fetch("/nueva-cotizacion", {
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
        id_solicitud = document.getElementById('id_solicitud').value;
        const contenedor = document.getElementById('cotizaciones');

        fetch('/cotizaciones/' + id_solicitud)  // Ruta Laravel que devuelve la tabla
            .then(response => {
                if (!response.ok) throw new Error('Error al cargar la tabla');
                return response.text();
            })
            .then(html => {
                contenedor.innerHTML = html;
            })
            .catch(error => {
                console.error('Error:', error);
                contenedor.innerHTML = '<p class="text-danger">No se pudo cargar la tabla.</p>';
            });

        const selectPrincipal = document.getElementById('contenedor_select_cotizacion_tipos');

        // Función para cargar las opciones
        async function cargarOpciones() {
            try {
                const response = await fetch('/select-cotizacion-tipos');
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
        const selectAerolineas = document.getElementById('contenedor_select_aerolineas');

        // Función para cargar las opciones
        async function cargarOpcionesAerolineas() {
            try {
                const response = await fetch('/select-aerolineas');
                const html = await response.text();

                // Crear un elemento temporal para parsear el HTML
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = html;

                // Obtener todas las opciones
                const opciones = tempDiv.querySelectorAll('option');

                // Limpiar select principal (excepto la primera opción)
                while (selectAerolineas.options.length > 1) {
                    selectAerolineas.remove(1);
                }

                // Agregar las nuevas opciones
                opciones.forEach(opcion => {
                    selectAerolineas.appendChild(opcion.cloneNode(true));
                });

            } catch (error) {
                console.error('Error al cargar las opciones:', error);
                // Opcional: Mostrar mensaje de error al usuario
            }
        }

        // Cargar las opciones al inicio
        cargarOpcionesAerolineas();

    });
    document.getElementById('contenedor_select_cotizacion_tipos').addEventListener('change', function () {
        const inputsDiv = document.getElementById('inputsOcultos');
        if (this.value === '9') {
            inputsDiv.style.display = 'block'; // Muestra los inputs
        } else {
            inputsDiv.style.display = 'none';  // Oculta los inputs
        }
        const fechaOtros = document.getElementById('fecha_oculta');
        if (this.value === '9') {
            fechaOtros.style.display = 'none';  // Oculta los inputs
        } else {
            fechaOtros.style.display = 'block'; // Muestra los inputs
        }
    });
    async function enviarComprobante(event) {
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
            const response = await fetch("/nuevo-comprobante", {
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

</script>
<script>
    document.addEventListener('click', function (e) {
        if (e.target.closest('.btn-comprobante')) {
            e.preventDefault();
            const idCotizacion = e.target.closest('.btn-comprobante').dataset.id;
            document.getElementById('inputIdCotizacion').value = idCotizacion;
        }
    });
</script>
<script>
    function loadCotizacionDetails(url) {
        // Mostrar un loader mientras se carga el contenido
        $('#cotizacion_detalles').html('<div class="text-center p-5"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>');

        // Hacer la petición AJAX para obtener el contenido
        $.get(url, function (data) {
            // Insertar el contenido recibido en el modal
            $('#cotizacion_detalles').html(data);
        }).fail(function () {
            // Manejar errores
            $('#cotizacion_detalles').html('<div class="alert alert-danger">Error al cargar los detalles. Por favor, intente nuevamente.</div>');
        });
    }

    // Opcional: Resetear el contenido cuando se cierre el modal
    $('#exampleModal_detalle_cotizacion').on('hidden.bs.modal', function () {
        $('#cotizacion_detalles').html('');
    });
</script>