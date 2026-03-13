<!DOCTYPE html>
<html>
<head>
<title>Reporte Diario</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
<h3>Reporte de Ventas del Día</h3>
<table class="table table-striped">
<tr>
<th>Producto</th>
<th>Cantidad Vendida</th>
<th>Método de Pago</th>
</tr>
@foreach($reporte as $r)
<tr>
<td>{{ $r->nombre }}</td>
<td>{{ $r->total_vendido }}</td>
<td>{{ $r->metodo_pago }}</td>
</tr>
@endforeach
</table>
</div>
</body>
</html>