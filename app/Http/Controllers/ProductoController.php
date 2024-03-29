<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductoStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = new Producto;
        return view('productos.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductoStoreRequest $request)
    {
        $data = $request->all();
        
        if ($request->has('imagen')) {
            $imagen = $request->file('imagen')->store('medias');
            $data['imagen'] = $imagen;
        }

        Producto::create($data);

        return redirect()->route('products.index')->with(['status' => 'Success', 'color' => 'green', 'message' => 'Producto creado correctamente']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $product)
    {
        return view('productos.create', compact('product'));
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $product)
    {
        $data = $request->all();

        if ($request->has('imagen')) {

            if ($product->imagen) {
                Storage::delete($product->imagen);
            }
            $imagen = $request->file('imagen')->store('medias');
            $data['imagen'] = $imagen;
        }

        $product->fill($data);
        $product->save();

        return redirect()->route('products.index')->with(['status' => 'Success', 'color' => 'blue', 'message' => 'Producto modificado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $product)
    {
        try {
            $product->delete();
            $resultado = ['status' => 'success', 'color' => 'green', 'message' => 'Producto eliminado correctamente'];
        } catch (\Exception $e) {
            $resultado = ['status' => 'error', 'color' => 'red', 'message' => 'No se puede eliminar el producto' . $e ];
        }

        return redirect()->route('products.index')->with($resultado);
    }
}
