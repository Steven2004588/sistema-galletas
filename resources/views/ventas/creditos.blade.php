<!DOCTYPE html>
<html>
<head>
<title>Ventas a Crédito</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
<h3>Ventas Fiadas</h3>
<table class="table table-bordered">
<tr>
<th>Cliente</th>
<th>Total</th>
<th>Pagar</th>
</tr>
@foreach($ventas as $venta)
<tr>
<td>{{ $venta->nombre }}</td>
<td>{{ $venta->total }}</td>
<td>
<form action="/creditos/pagar" method="POST">
@csrf
<input type="hidden" name="venta_id" value="{{ $venta->id }}">
<input type="number" name="monto" class="form-control mb-2">
<button class="btn btn-success btn-sm">
Registrar pago
</button>
</form>
</td>
</tr>
@endforeach
</table>
</div>
</body>
</html>