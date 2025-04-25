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
                        <div class="col">{{$cotizacion->id_cotizacion}}</div>
                        <div class="col"><b>Costo</b></div>
                        <div class="col">$ {{number_format($cotizacion->cotizacion_costo, 2)}}</div>
                        <div class="col"><b>Comprobado</b></div>
                        <div class="col">$ {{number_format($suma_gastos, 2)}}</div>
                        <div class="col"><b>Tipo</b></div>
                        <div class="col">{{$cotizacion->tipo_nombre}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        @foreach ($comprobantes as $comprobante)
            <div class="col-2 mb-2">
                <div class="card">
                    <img src="/{{$comprobante->archivo_ruta}}" alt="" width="150vw" height="90vh" class="card-img-top">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <p class="card-text">{{$comprobante->comprobante_gasto_observaciones}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="card-text">$ {{number_format($comprobante->comprobante_gasto_monto, 2)}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="modal fade" id="exampleModal_gasto" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                                <input type="hidden" name="id_cotizacion" id="inputIdCotizacion"
                                    value="{{$cotizacion->id_cotizacion}}">
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
    <div class="modal fade" id="exampleModal_factura" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
    <script>
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