@foreach ($motivos as $motivo)
    <option value="{{$motivo->id_motivo}}">{{$motivo->motivo_nombre}}</option>
@endforeach