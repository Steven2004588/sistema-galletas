<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">
<title>Inventario Diario</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">
<h4>📦 Inventario Diario</h4>
</div>

<div class="card-body">

<a href="/dashboard" class="btn btn-secondary mb-3">
Volver al inicio
</a>

<table class="table table-bordered text-center">

<thead class="table-dark">

<tr>
<th>Producto</th>
<th>Cantidad Inicial</th>
<th>Guardar</th>
</tr>

</thead>

<tbody>

@foreach($productos as $producto)

<tr>

<td>{{ $producto->nombre }}</td>

<td>

<form action="/inventario/store" method="POST">

@csrf

<input type="hidden" name="producto_id" value="{{ $producto->id }}">

<input type="number" name="cantidad" class="form-control" required>

</td>

<td>

<button class="btn btn-success">
Guardar
</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

</div>

</body>
</html>