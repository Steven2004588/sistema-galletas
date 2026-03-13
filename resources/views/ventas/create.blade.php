<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Registrar Venta</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-dark text-white">
<h4>🧾 Registrar Venta</h4>
</div>

<div class="card-body">

<form action="/ventas/store" method="POST">
@csrf

<div class="row">

<div class="col-md-6 mb-3">
<label class="form-label">Nombre del Cliente</label>
<input type="text" name="nombre" class="form-control" required>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Celular</label>
<input type="text" name="celular" class="form-control">
</div>

</div>

<div class="row">

<div class="col-md-6 mb-3">
<label class="form-label">Producto</label>
<select name="producto" id="producto" class="form-control">

@foreach($productos as $producto)

<option value="{{ $producto->id }}" data-precio="{{ $producto->precio }}">
{{ $producto->nombre }} - ${{ $producto->precio }}
</option>

@endforeach

</select>
</div>

<div class="col-md-3 mb-3">
<label class="form-label">Cantidad</label>
<input type="number" name="cantidad" id="cantidad" class="form-control" required>
</div>

<div class="col-md-3 mb-3">
<label class="form-label">Precio</label>
<input type="number" name="precio" id="precio" class="form-control" required>
</div>

</div>

<div class="row">

<div class="col-md-6 mb-3">
<label class="form-label">Total</label>
<input type="number" name="total" id="total" class="form-control" required>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Método de Pago</label>

<select name="metodo_pago" class="form-control">
<option value="efectivo">Efectivo</option>
<option value="transferencia">Transferencia</option>
<option value="credito">Crédito</option>
</select>

</div>

</div>

<div class="form-check mb-3">

<input class="form-check-input" type="checkbox" name="credito" value="1">
<label class="form-check-label">
Venta a crédito
</label>

</div>

<button class="btn btn-success">
Guardar Venta
</button>

<a href="/dashboard" class="btn btn-secondary">
Volver
</a>

</form>

</div>
</div>
</div>

<script>

let producto = document.getElementById("producto");
let precio = document.getElementById("precio");
let cantidad = document.getElementById("cantidad");
let total = document.getElementById("total");

producto.addEventListener("change", function() {

let precioSeleccionado = producto.options[producto.selectedIndex].getAttribute("data-precio");
precio.value = precioSeleccionado;

calcularTotal();

});

cantidad.addEventListener("input", calcularTotal);
precio.addEventListener("input", calcularTotal);

function calcularTotal(){

let p = parseFloat(precio.value) || 0;
let c = parseFloat(cantidad.value) || 0;

total.value = p * c;

}

</script>

</body>
</html>