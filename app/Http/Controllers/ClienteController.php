<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClienteStoreRequest;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::paginate(10);
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cliente = new Cliente();
        return view('clientes.create', compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClienteStoreRequest $request)
    {        
        Cliente::create($request->validated());
        return redirect()->route('clientes.index')->with(['status' => 'success', 'color' => 'green', 'message' => 'Cliente creado correctamente']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.create', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClienteStoreRequest $request, Cliente $cliente)
    {
        $cliente->fill($request->validated());
        $cliente->save();

        return redirect()->route('clientes.index')->with(['status' => 'success', 'color' => 'green', 'message' => 'Cliente actualizado con éxito']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        try {
            $cliente->delete();
            $with = ['status' => 'success', 'color' => 'red', 'message' => 'Cliente eliminado correctamente'];  
        } catch (\Exception $e) {
            $with = ['status' => 'success', 'color' => 'red', 'message' => 'No se puede eliminar el cliente' . $e];
        }

        return redirect()->route('clientes.index')->with($with);
    }
}
