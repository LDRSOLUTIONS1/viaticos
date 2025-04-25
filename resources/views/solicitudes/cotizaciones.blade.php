<div class="container">
    <h5 class="mb-2 m-3 titulo">Vuelos</h5>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Fecha Compra</th>
                                <th>Aerolínea</th>
                                <th>Costo</th>
                                <th>Autoriza Jefe</th>
                                <th>Autoriza Viáticos</th>
                                <th>Gasto Comp</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vuelos as $vuelo)
                                <tr>
                                    <td>{{$vuelo->cotizacion_fecha_compra}}</td>
                                    <td>{{$vuelo->aerolinea_nombre}}</td>
                                    <td>$ {{number_format($vuelo->cotizacion_costo, 2)}}</td>
                                    <td>{{$vuelo->persona_autoriza}}</td>
                                    <td>{{$vuelo->id_persona_autoriza}}</td>
                                    <td>$ 0.00</td>
                                    <td>
                                        <a href="{{$vuelo->id_cotizacion}}"
                                            class="link-secondary tooltip-container m-2 btn-comprobante" type="button"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal_gasto" data-id="{{$vuelo->id_cotizacion}}">
                                            <span class="tooltip-text">Subir Comprobante</span>
                                            <i class="fa-solid fa-arrow-up-from-bracket"></i></a>
                                        <a href="" class="link-primary tooltip-container m-2" type="button"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal_detalle_cotizacion">
                                            <span class="tooltip-text">Ver Detalles</span>
                                            <i class="fa-solid fa-magnifying-glass"></i></a>
                                        <a href="/ver-comprobantes/{{$vuelo->id_cotizacion}}" class="link-secondary tooltip-container m-2" type="button">
                                            <span class="tooltip-text">Ver Comprobantes</span>
                                            <i class="fa-solid fa-folder-open"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <h5 class="mb-2 m-3 titulo">Otros</h5>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tipo</th>
                                <th>Fecha</th>
                                <th>Costo</th>
                                <th>Autoriza Jefe</th>
                                <th>Autoriza Viáticos</th>
                                <th>Gasto Comp.</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($otros as $otro)


                                <tr>
                                    <td>{{$otro->tipo_nombre}}</td>
                                    <td>{{$otro->cotizacion_fecha_inicio}}</td>
                                    <td>$ {{number_format($otro->cotizacion_costo, 2)}}</td>
                                    <td>{{$otro->id_persona_autoriza}}</td>
                                    <td>{{$otro->id_persona_autoriza}}</td>
                                    <td>$ 0.00</td>
                                    <td>
                                        <a href="{{$otro->id_cotizacion}}"
                                            class="link-secondary tooltip-container m-2 btn-comprobante" type="button"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal_gasto"
                                            data-id="{{$otro->id_cotizacion}}">
                                            <span class="tooltip-text">Subir Comprobante</span>
                                            <i class="fa-solid fa-arrow-up-from-bracket"></i></a>
                                        <a href="" class="link-primary tooltip-container m-2" type="button"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal_detalle_cotizacion">
                                            <span class="tooltip-text">Ver Detalles</span>
                                            <i class="fa-solid fa-magnifying-glass"></i></a>
                                        <a href="/ver-comprobantes/{{$otro->id_cotizacion}}" class="link-secondary tooltip-container m-2" type="button">
                                            <span class="tooltip-text">Ver Comprobantes</span>
                                            <i class="fa-solid fa-folder-open"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal-lg" id="exampleModal_detalle_cotizacion" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
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
                                <td>21-04-2025</td>
                                <td>05:30:00</td>
                                <td>23-04-2025</td>
                                <td>13:00:00</td>
                                <td>KJDLd</td>
                                <td>Puebla</td>
                                <td>MEX-PUE</td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal-lg" id="exampleModal_detalle_otros" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
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
                                <th>Fecha Regreso</th>
                            </tr>
                            <tr>
                                <td>21-04-2025</td>
                                <td>23-04-2025</td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
