<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{

    public function index()
    {
        $productos = DB::table('productos')->get();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        DB::table('productos')->insert([
            'nombre' => $request->nombre,
            'precio' => $request->precio
        ]);

        return redirect('/productos');
    }

    public function edit($id)
    {
        $producto = DB::table('productos')->where('id', $id)->first();
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        DB::table('productos')
            ->where('id', $id)
            ->update([
                'nombre' => $request->nombre,
                'precio' => $request->precio
            ]);

        return redirect('/productos');
    }

    public function destroy($id)
    {
        DB::table('productos')->where('id', $id)->delete();
        return redirect('/productos');
    }

}