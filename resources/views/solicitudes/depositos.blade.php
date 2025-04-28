@extends("templete")
<div class="container justify-content-center">
    <h4 class="mb-2 m-3 text-center titulo">Depósitos</h4>
</div>
<div class="container d-flex justify-content-end">
    <button class="btn btn-secondary btn-sm m-2" data-bs-toggle="modal"
        data-bs-target="#exampleModal_deposito">Nuevo</button>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card mb-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col"><b>Folio Solicitud</b></div>
                        <div class="col">{{$id_solicitud}}</div>
                        <div class="col"><b>Total Depósitos</b></div>
                        <div class="col">$ {{number_format($suma_depositos, 2)}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        @foreach ($depositos as $deposito)
            <div class="col-2 mb-2">
                <div class="card">
                    <img src="/{{$deposito->archivo_ruta}}" alt="" width="150vw" height="90vh" class="card-img-top">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <p class="card-text">{{$deposito->deposito_comentario}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="card-text">$ {{number_format($deposito->deposito_monto, 2)}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="modal fade" id="exampleModal_deposito" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/nuevo-deposito" method="post" enctype="multipart/form-data" onsubmit="enviarDeposito(event)">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Depósito</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <input type="hidden" name="id_solicitud" id="id_solicitud" value="{{$id_solicitud}}">
                            <label for="id_tipo">Tipo</label>
                            <select name="id_tipo" id="id_tipo" class="form-select">
                                <option value="" selected disabled>Selecciona</option>
                                <option value="1">Reembolso</option>
                                <option value="2">Dispersión</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="id_cuenta">Cuenta</label>
                            <select name="id_cuenta" id="id_cuenta" class="form-select">
                                <option value="" selected disabled>Selecciona</option>
                                <option value="2">CHRISTIAN REYES - BBVA - 012830015456604045</option>
                                <option value="3">CHRISTIAN REYES - BBVA - 012830016756604045</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="deposito_fecha">Fecha</label>
                            <input type="date" name="deposito_fecha" id="deposito_fecha" class="form-control">
                        </div>
                        <div class="col">
                            <label for="deposito_monto">Monto</label>
                            <input type="text" name="deposito_monto" id="deposito_monto" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="deposito_comentario">Comentarios</label>
                            <textarea name="deposito_comentario" id="deposito_comentario"
                                class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <label for="">Subir archivo</label>
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
    async function enviarDeposito(event) {
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
            const response = await fetch("/nuevo-deposito", {
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