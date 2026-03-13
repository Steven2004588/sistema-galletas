<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventarioController extends Controller
{

    public function index()
{
    $productos = DB::table('productos')->get();

    return view('inventario.index', compact('productos'));
}

    public function store(Request $request)
    {

        DB::table('inventario_dia')->insert([
            'fecha' => date('Y-m-d'),
            'producto_id' => $request->producto_id,
            'cantidad_inicial' => $request->cantidad,
            'cantidad_restante' => $request->cantidad
        ]);

        return redirect('/inventario');
    }

}