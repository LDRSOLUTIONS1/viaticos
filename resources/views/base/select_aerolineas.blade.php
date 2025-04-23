@foreach ($aerolineas as $aerolinea)
    <option value="{{$aerolinea->id_aerolinea}}">{{$aerolinea->aerolinea_nombre}}</option>
@endforeach