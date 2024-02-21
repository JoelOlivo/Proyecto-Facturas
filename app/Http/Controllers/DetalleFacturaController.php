<?php

namespace App\Http\Controllers;

use App\Models\DetalleFactura;
use App\Http\Controllers\Controller;
use App\Models\Factura;
use App\Models\Producto;
use Illuminate\Http\Request;

class DetalleFacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Factura $factura)
    {
        $productos = Producto::all();
        $detalles = DetalleFactura::with('producto')->where('id_factura', $factura->id)->get();

        return view('facturas.agregarProductos', compact('productos', 'detalles', 'factura'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_producto' => 'required',
            'id_factura' => 'required',
            'cantidad' => 'required'
        ]);

        $data = $request->only(['id_producto','id_factura','cantidad', 'precio']);
        
        if ($data['precio'] == "" ) {
            $data['precio'] = Producto::find($data['id_producto'])->precio;
        }
        
        $data['precio_total'] = $data['precio'] * $data['cantidad'];

        DetalleFactura::create($data);

        return redirect()->route('facturas.agregarProductos', ['factura' => $data['id_factura']])->with(['status' => 'success', 'color' => 'green', 'message' => 'Agregado correctamente']);
    }

    /**
     * Display the specified resource.
     */
    public function show(DetalleFactura $detalleFactura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetalleFactura $detalleFactura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetalleFactura $detalleFactura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetalleFactura $detalleFactura)
    {
        //
    }
}
