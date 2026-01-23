<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Producto;

class ProductosController extends Controller
{
    // 
    // public function index() {
    //     return "Listado de productos";
    // }

    // public function index(int $id_producto): string
    public function index(): View
    {
        // Obtener todos los productos
        $productos = Producto::all();
        // Retornar la vista 'productos.index' con el listado de productos
        return view('productos.index', compact('productos'));

        // dd(Producto::all()); //dd(dump and die) muestra todo el contenido de la respuesta
        // // en este caso saca todos los productos
        // return view('welcome');

        //Para ver esto  miurl+ /productos
    }
    public function edit($cod_producto): view{
        $producto=Producto::where("cod",$cod_producto)->firstOrFail();
        return view('productos.edit', compact('producto'));
        //Para ver esto  miurl+ productos/3DSNG(vamos el id del producto)/edit
    }
}
