@extends("templete")
<div class="container justify-content-center">
    <h4 class="mb-2 m-3 text-center titulo">Comprobantes de Gastos</h4>
</div>
<div class="container d-flex justify-content-end">
    <button class="btn btn-secondary btn-sm m-2" data-bs-toggle="modal"
        data-bs-target="#exampleModal_gasto">Nuevo</button>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card mb-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col"><b>Folio Cotización</b></div>
                        <div class="col">1</div>
                        <div class="col"><b>Costo</b></div>
                        <div class="col">$2,500.00</div>
                        <div class="col"><b>Gasto Comprobado</b></div>
                        <div class="col">$2,500.00</div>
                    </div>
                    <div class="row">
                        <div class="col"><b>Fecha Compra</b></div>
                        <div class="col">13-05-2025</div>
                        <div class="col"><b>Aerolínea</b></div>
                        <div class="col">Volaris</div>
                        <div class="col"><b>Costo</b></div>
                        <div class="col">$1,200.00</div>
                    </div>
                    <div class="row">
                        <div class="col"><b>Clave Reservación</b></div>
                        <div class="col">KJDLd</div>
                        <div class="col"><b>Ruta</b></div>
                        <div class="col">MEX-CNC</div>
                        <div class="col"><b>Destino</b></div>
                        <div class="col">Cancún</div>
                    </div>
                    <div class="row">
                        <div class="col"><b>Fecha Viaje</b></div>
                        <div class="col">15-05-2025</div>
                        <div class="col"><b>Hora Viaje</b></div>
                        <div class="col">05:30:00</div>
                        <div class="col"><b>Autoriza Jefe</b></div>
                        <div class="col">Isaac Sánchez</div>
                    </div>
                    <div class="row">
                        <div class="col"><b>Fecha Regreso</b></div>
                        <div class="col">18-05-2026</div>
                        <div class="col"><b>Hora Regreso</b></div>
                        <div class="col">13:20:00</div>
                        <div class="col"><b>Autoriza Viáticos</b></div>
                        <div class="col">Jenny Astrid</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-2">
            <div class="card">
                <img src="\recursos\descarga_1.jpg" alt="" width="150vh" class="card-img-top">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <p class="card-text">Comprobante de Gasolina</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card">
                <img src="\recursos\descarga.jpg" alt="" width="150vh" class="card-img-top">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <p class="card-text">Comprobante de Gasolina</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card">
                <img src="\recursos\descarga_1.jpg" alt="" width="150vh" class="card-img-top">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <p class="card-text">Comprobante de Gasolina</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card">
                <img src="\recursos\descarga.jpg" alt="" width="150vh" class="card-img-top">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <p class="card-text">Comprobante de Gasolina</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="" class="link-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal_factura"><b>Validar</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card">
                <img src="\recursos\descarga_1.jpg" alt="" width="150vh" class="card-img-top">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <p class="card-text">Comprobante de Gasolina</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card">
                <img src="\recursos\descarga.jpg" alt="" width="150vh" class="card-img-top">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <p class="card-text">Comprobante de Gasolina</p>
                        </div>
                    </div>
                </div>
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
<div class="modal fade" id="exampleModal_deposito" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Depósito</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <label for="">Tipo</label>
                        <select name="" id="" class="form-select">
                            <option value="">Selecciona</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="">Cuenta</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="">Destino</label>
                        <input type="text" class="form-control">
                    </div>
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
                        <label for="">Comentarios</label>
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
<div class="modal fade" id="exampleModal_factura" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Validar Factura</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <label for="">No Factura</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col">
                        <label for="">Monto</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col">
                        <label for="">Uso CFDI</label>
                        <select name="" id="" class="form-select">
                            <option value="">G01: Adquisición de mercancías</option>
                            <option value="">G02: Devoluciones, descuentos o bonificaciones</option>
                            <option value="">G03: Gastos en general</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="">Folio Fiscal</label>
                        <textarea name="" id="" class="form-control"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="">Razón Social</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Validar</button>
            </div>
        </div>
    </div>
</div>