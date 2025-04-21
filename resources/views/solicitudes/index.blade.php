@extends("templete")
<div class="container justify-content-center">
    <h4 class="mb-4 m-3 text-center titulo">Solicitudes de Viáticos</h4>
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
                                <th>Tipo</th>
                                <th>Motivo</th>
                                <th>Esatus</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>13-04-2025</td>
                                <td>Uriel Sosa</td>
                                <td>Viáticos</td>
                                <td>Gasolina</td>
                                <td>Cita de negociación con cliente</td>
                                <td>Activa</td>
                                <td><a href="/solicitud-detalles" class="link-secondary"><b>Ver Detalles</b></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>