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
                                <th>Gasto Comp.</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vuelos as $vuelo)
                            
                            @endforeach
                            <tr>
                                <td>11-04-2025</td>
                                <td>Volaris</td>
                                <td>$1,900.00</td>
                                <td>Jorge Isaac</td>
                                <td>Jenny Astrid</td>
                                <td>$1,900.00</td>
                                <td>
                                    <a href="" class="link-secondary tooltip-container m-2" type="button"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal_gasto">
                                        <span class="tooltip-text">Subir Comprobante</span>
                                        <i class="fa-solid fa-arrow-up-from-bracket"></i></a>
                                    <a href="" class="link-primary tooltip-container m-2" type="button"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal_detalle_cotizacion">
                                        <span class="tooltip-text">Ver Detalles</span>
                                        <i class="fa-solid fa-magnifying-glass"></i></a>
                                    <a href="/gastos" class="link-secondary tooltip-container m-2" type="button">
                                        <span class="tooltip-text">Ver Comprobantes</span>
                                        <i class="fa-solid fa-folder-open"></i></a>
                                </td>
                            </tr>
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
                                <th>Fecha Compra</th>
                                <th>Costo</th>
                                <th>Autoriza Jefe</th>
                                <th>Autoriza Viáticos</th>
                                <th>Gasto Comp.</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Gasolina</td>
                                <td>11-04-2025</td>
                                <td>$1,200.00</td>
                                <td>Jorge Isaac</td>
                                <td>Jenny Astrid</td>
                                <td>$500.00</td>
                                <td>
                                    <a href="" class="link-secondary tooltip-container m-2" type="button"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal_gasto">
                                        <span class="tooltip-text">Subir Comprobante</span>
                                        <i class="fa-solid fa-arrow-up-from-bracket"></i></a>
                                    <a href="" class="link-primary tooltip-container m-2" type="button"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal_detalle_cotizacion">
                                        <span class="tooltip-text">Ver Detalles</span>
                                        <i class="fa-solid fa-magnifying-glass"></i></a>
                                    <a href="/gastos" class="link-secondary tooltip-container m-2" type="button">
                                        <span class="tooltip-text">Ver Comprobantes</span>
                                        <i class="fa-solid fa-folder-open"></i></a>
                                </td>
                            </tr>
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
<div class="modal fade" id="exampleModal_gasto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Comprobar Gasto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <label for="">Fecha</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col">
                        <label for="">Monto</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input class="form-check-input" type="checkbox" value="" id="checkChecked" checked>
                        <label class="form-check-label" for="checkChecked">
                            Es Factura
                        </label>
                    </div>
                    <div class="col">
                        <label for="">Deducible</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="">Observaciones</label>
                        <textarea name="" id="" class="form-control"></textarea>
                    </div>
                </div>
                <div class="row">
                    <label for="">Subir archivo</label>
                    <div class="col">
                        <input type="file" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>