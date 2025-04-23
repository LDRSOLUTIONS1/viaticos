@foreach ($tipos as $tipo)
    <option value="{{$tipo->id_cotizacion_tipo}}">{{$tipo->tipo_nombre}}</option>
@endforeach