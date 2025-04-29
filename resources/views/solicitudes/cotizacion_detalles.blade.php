@if ($cotizacion->id_cotizacion_tipo == 9)
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Detalle Cotización</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <tr>
                            <th>Fecha Viaje</th>
                            <th>Hora Viaje</th>
                            <th>Fecha Regreso</th>
                            <th>Hora Regreso</th>
                            <th>Clave Reservación</th>
                            <th>Destino</th>
                            <th>Ruta</th>
                        </tr>
                        <tr>
                            <td>{{$cotizacion->cotizacion_fecha_inicio}}</td>
                            <td>{{$cotizacion->cotizacion_hora_inicio}}</td>
                            <td>{{$cotizacion->cotizacion_fecha_fin}}</td>
                            <td>{{$cotizacion->cotizacion_hora_fin}}</td>
                            <td>{{$cotizacion->cotizacion_clave_reservacion}}</td>
                            <td>{{$cotizacion->cotizacion_destino}}</td>
                            <td>{{$cotizacion->cotizacion_ruta}}</td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
    </div>
@else
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Detalle Cotización</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <tr>
                            <th>Destino</th>
                        </tr>
                        <tr>
                            <td>{{$cotizacion->cotizacion_destino}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
    </div>
@endif