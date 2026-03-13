<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Galletas</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
<div class="card shadow">
<div class="card-header bg-dark text-white d-flex justify-content-between">
<h4 class="mb-0">🍪 Lista de Galletas</h4>
<a href="/productos/create" class="btn btn-success">
Agregar Galleta
</a>
</div>
<div class="card-body">
<table class="table table-striped table-hover text-center">
<thead class="table-dark">
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Precio</th>
<th>Acciones</th>
</tr>
</thead>
<tbody>
@foreach($productos as $producto)
<tr>
<td>{{ $producto->id }}</td>
<td>{{ $producto->nombre }}</td>
<td>$ {{ $producto->precio }}</td>
<td>
<a href="/productos/edit/{{ $producto->id }}" class="btn btn-warning btn-sm">
Editar
</a>
<a href="/productos/delete/{{ $producto->id }}" class="btn btn-danger btn-sm">
Eliminar
</a>
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