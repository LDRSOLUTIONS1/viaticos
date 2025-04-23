@foreach ($conceptos as $concepto)
    <option value="{{$concepto->id_concepto}}">{{$concepto->concepto_nombre}}</option>
@endforeach