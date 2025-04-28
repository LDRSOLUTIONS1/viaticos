<select name="" id="">

    @foreach ($cuentas as $cuenta)
    <option value="{{$cuenta->id_cuenta}}">{{$cuenta->cuenta_nombre}}</option>
    @endforeach
</select>