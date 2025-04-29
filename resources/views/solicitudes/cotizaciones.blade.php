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
                                            data-bs-toggle="modal" data-bs-target="#exampleModal_gasto"
                                            data-id="{{$vuelo->id_cotizacion}}">
                                            <span class="tooltip-text">Subir Comprobante</span>
                                            <i class="fa-solid fa-arrow-up-from-bracket"></i></a>
                                        <a href="/cotizacion-detalles/{{$vuelo->id_cotizacion}}" class="link-primary tooltip-container m-2" type="button"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal_detalle_cotizacion"
                                            onclick="loadCotizacionDetails(this.href); return false;">
                                            <span class="tooltip-text">Ver Detalles</span>
                                            <i class="fa-solid fa-magnifying-glass"></i></a>
                                        <a href="/ver-comprobantes/{{$vuelo->id_cotizacion}}"
                                            class="link-secondary tooltip-container m-2" type="button">
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
                                        <a href="/cotizacion-detalles/{{$otro->id_cotizacion}}" class="link-primary tooltip-container m-2" type="button"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal_detalle_cotizacion"
                                            onclick="loadCotizacionDetails(this.href); return false;">
                                            <span class="tooltip-text">Ver Detalles</span>
                                            <i class="fa-solid fa-magnifying-glass"></i></a>
                                        <a href="/ver-comprobantes/{{$otro->id_cotizacion}}"
                                            class="link-secondary tooltip-container m-2" type="button">
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
    <div class="modal-dialog" id="cotizacion_detalles">
        
    </div>
</div>