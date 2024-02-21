<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Http\Controllers\Controller;
use App\Http\Requests\FacturaStoreRequest;
use App\Mail\FacturaMail;
use App\Models\Cliente;
use App\Models\DetalleFactura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facturas = Factura::with('cliente')->paginate(10);
        return view('facturas.index', compact('facturas'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $factura = new Factura();
        $clientes = Cliente::all();
        return view('facturas.create', compact('factura', 'clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FacturaStoreRequest $request)
    {
        $factura = Factura::create($request->validated());
        return redirect()->route('facturas.agregarProductos', ['factura' => $factura->id])->with(['status' => 'success', 'color' => 'green', 'message' => 'Factura creada correctamente']);


    }

    /**
     * Display the specified resource.
     */
    public function show(Factura $factura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Factura $factura)
    {
        return view('facturas.create', compact('factura'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Factura $factura)
    {
        $factura->fill($request->validate());
        $factura->save();
        return redirect()->route('facturas.index')->with(['status' => 'success', 'color' => 'green', 'message' => 'Factura actualizada correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Factura $factura)
    {
        try {
            $factura->delete();
            $with = ['status' => 'success', 'color' => 'green', 'message' => 'factura eliminada correctamente'];
        } catch (\Throwable $th) {
            $with = ['status' => 'error', 'color' => 'red', 'message' => 'factura no eliminada'. $th];
        }

        return redirect()->route('facturas.index')->with($with);
    }

    public function completeSend (Request $request, Factura $factura) {

        $correoCliente = $factura->cliente->email;
        $detalleFactura = DetalleFactura::with('producto')
                            ->where('id_factura', $factura->id)
                            ->get();

        try {
            Mail::to($correoCliente)->queue(new FacturaMail($factura, $detalleFactura));
            
            $factura->status = 'complete';
            $factura->save();

            $with = ['status' => 'success', 'color' => 'green', 'message' => 'Correo envíado exitosamente'];
        } catch (\Throwable $th) {
            $with = ['status' => 'error', 'color' => 'red', 'message' => 'Correo no enviado'. $th];
        }     
        
        return redirect()->route('facturas.index')->with($with);

    }
}
