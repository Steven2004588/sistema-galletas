<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VentaController extends Controller
{

    public function create()
    {
        $productos = DB::table('productos')->get();
        return view('ventas.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $cliente_id = DB::table('clientes')->insertGetId([
            'nombre' => $request->nombre,
            'celular' => $request->celular
        ]);

        $venta_id = DB::table('ventas')->insertGetId([
            'cliente_id' => $cliente_id,
            'fecha' => now(),
            'descuento' => 0,
            'total' => $request->total,
            'metodo_pago' => $request->metodo_pago,
            'es_credito' => $request->credito
        ]);

        DB::table('detalle_ventas')->insert([
            'venta_id' => $venta_id,
            'producto_id' => $request->producto,
            'cantidad' => $request->cantidad,
            'precio_unitario' => $request->precio
        ]);

        return redirect('/ventas/create');
    }

    public function creditos()
    {
        $ventas = DB::table('ventas')
        ->join('clientes','ventas.cliente_id','=','clientes.id')
        ->where('ventas.es_credito',1)
        ->select('ventas.*','clientes.nombre')
        ->get();

        return view('ventas.creditos', compact('ventas'));
    }

    public function pagarCredito(Request $request)
    {
        DB::table('pagos_credito')->insert([
            'venta_id' => $request->venta_id,
            'monto' => $request->monto,
            'fecha' => now()
        ]);

        return redirect('/creditos');
    }

    public function reporte()
    {
        $reporte = DB::select("
        SELECT p.nombre,
        SUM(d.cantidad) as total_vendido,
        v.metodo_pago
        FROM detalle_ventas d
        JOIN ventas v ON d.venta_id = v.id
        JOIN productos p ON d.producto_id = p.id
        WHERE DATE(v.fecha) = CURDATE()
        GROUP BY p.nombre, v.metodo_pago
        ");

        return view('ventas.reporte', compact('reporte'));
    }

}