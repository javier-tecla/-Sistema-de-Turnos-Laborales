<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sucursales = Sucursal::all();
        return view('sucursales.index', compact('sucursales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sucursales.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:255',
        ]);

        $sucursal = new Sucursal();
        $sucursal->nombre = $request->input('nombre');
        $sucursal->direccion = $request->input('direccion');
        $sucursal->save();

        return redirect()->route('sucursales.index')->with('success', 'Sucursal creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sucursal $sucursal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sucursal = Sucursal::findOrFail($id);
        return view('sucursales.edit', compact('sucursal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:255',
        ]);

        $sucursal = Sucursal::findOrFail($id);
        $sucursal->nombre = $request->input('nombre');
        $sucursal->direccion = $request->input('direccion');
        $sucursal->save();

        return redirect()->route('sucursales.index')->with('success', 'Sucursal actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sucursal = Sucursal::findOrFail($id);
        $sucursal->delete();

        return redirect()->route('sucursales.index')->with('success', "Sucursal eliminada exitosamente.");
    }
}
