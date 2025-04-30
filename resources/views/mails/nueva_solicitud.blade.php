<!DOCTYPE html>
<html>
<head>
    <title>Pedido Enviado</title>
</head>
<body>
    <h1>Hola, {{ $user->name }}</h1>
    <p>Tu pedido #{{ $orderDetails['id'] }} ha sido enviado.</p>
    <p>Detalles del envío: {{ $orderDetails['shipping_info'] }}</p>
</body>
</html>