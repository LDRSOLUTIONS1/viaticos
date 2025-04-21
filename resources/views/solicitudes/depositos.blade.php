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
        <div class="col-2">
            <div class="card">
                <img src="\recursos\descarga_1.jpg" alt="" width="150vh" class="card-img-top">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <p class="card-text">Depósito a cuenta personal</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-3">
            <div class="card">
                <img src="\recursos\descarga.jpg" alt="" width="150vh" class="card-img-top">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <p class="card-text">Depósito a cuenta nómina</p>
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
                            <p class="card-text">Depósito a cuenta personal</p>
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
                            <p class="card-text">Depósito a cuenta nómina</p>
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
                            <p class="card-text">Depósito a cuenta personal</p>
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
                            <p class="card-text">Depósito a cuenta nómina</p>
                        </div>
                    </div>
                </div>
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
                            <option value="">Reembolso</option>
                            <option value="">Dispersión</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="">Cuenta</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
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
