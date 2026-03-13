<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">
<title>Editar Galleta</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">
<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-md-6">
<div class="card shadow">
<div class="card-header bg-warning">
<h4>Editar Galleta</h4>
</div>
<div class="card-body">
<form action="/productos/update/{{ $producto->id }}" method="POST">
@csrf
<div class="mb-3">
<label class="form-label">Nombre</label>
<input type="text" name="nombre" class="form-control" value="{{ $producto->nombre }}" required>
</div>
<div class="mb-3">
<label class="form-label">Precio</label>
<input type="number" name="precio" class="form-control" value="{{ $producto->precio }}" required>
</div>
<button class="btn btn-warning w-100">
Actualizar
</button>
</form>
</div>
<div class="card-footer text-center">
<a href="/productos" class="btn btn-secondary">
Volver
</a>
</div>
</div>
</div>
</div>
</div>
</body>
</html>