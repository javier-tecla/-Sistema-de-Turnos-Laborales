<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::all();

        return view('empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return response()->json($request->all());
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'tipo_doc' => 'required|string|max:20',
            'numero_doc' => 'required|string|max:20|unique:empleados',
            'email' => 'required|email|unique:users,email',
            'telefono' => 'nullable|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'profesion' => 'nullable|string|max:255',
            'fecha_nacimiento' => 'nullable|date',
            'genero' => 'nullable|string|max:10',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
        ]);

        $usuario = new User;
        $usuario->username = $request->input('nombres').' '.$request->input('apellidos');
        $usuario->first_name = $request->input('nombres');
        $usuario->last_name = $request->input('apellidos');
        $usuario->email = $request->input('email');
        $usuario->user_type = 'EMPLEADO';
        $usuario->status = 'ACTIVE';
        $usuario->password = bcrypt($request->input('numero_doc'));
        $usuario->save();

        $usuario->assignRole('EMPLEADO');

        $empleado = new Empleado;
        $empleado->usuario_id = $usuario->id;
        $empleado->nombres = $request->input('nombres');
        $empleado->apellidos = $request->input('apellidos');
        $empleado->tipo_doc = $request->input('tipo_doc');
        $empleado->numero_doc = $request->input('numero_doc');
        $empleado->telefono = $request->input('telefono');
        $empleado->direccion = $request->input('direccion');
        $empleado->profesion = $request->input('profesion');
        $empleado->fecha_nacimiento = $request->input('fecha_nacimiento');
        $empleado->genero = $request->input('genero');

        if ($request->hasFile('avatar')) {
            $empleado->avatar = $request->file('avatar')->store('avatars', 'public');
        }

        $empleado->save();

        return redirect()->route('empleados.index')->with('success', 'Empleado creado exitosamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $empleado = Empleado::find($id);

        return view('empleados.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // echo "Editar empleado con ID: " . $id;
        $empleado = Empleado::find($id);

        return view('empleados.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $empleado = Empleado::find($id);
        $usuario = User::find($empleado->usuario_id);
        // return response()->json($request->all());
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'tipo_doc' => 'required|string|max:20',
            'numero_doc' => 'required|string|max:20|unique:empleados,numero_doc,'.$id,
            'email' => 'required|email|unique:users,email,'.$usuario->id,
            'telefono' => 'nullable|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'profesion' => 'nullable|string|max:255',
            'fecha_nacimiento' => 'nullable|date',
            'genero' => 'nullable|string|max:10',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
        ]);

        $usuario->username = $request->input('nombres').' '.$request->input('apellidos');
        $usuario->first_name = $request->input('nombres');
        $usuario->last_name = $request->input('apellidos');
        $usuario->email = $request->input('email');
        $usuario->save();

        $empleado->nombres = $request->input('nombres');
        $empleado->apellidos = $request->input('apellidos');
        $empleado->tipo_doc = $request->input('tipo_doc');
        $empleado->numero_doc = $request->input('numero_doc');
        $empleado->telefono = $request->input('telefono');
        $empleado->direccion = $request->input('direccion');
        $empleado->profesion = $request->input('profesion');
        $empleado->fecha_nacimiento = $request->input('fecha_nacimiento');
        $empleado->genero = $request->input('genero');

        if ($request->hasFile('avatar')) {
            if ($empleado->avatar && Storage::disk('public')->exists($empleado->avatar)) {
                // Eliminar el avatar anterior si existe
                Storage::disk('public')->delete($empleado->avatar);
            }
            $empleado->avatar = $request->file('avatar')->store('avatars', 'public');
        }
        $empleado->save();

        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $empleado = Empleado::find($id);
        $usuario = User::find($empleado->usuario_id);

        if ($empleado->avatar && Storage::disk('public')->exists($empleado->avatar)) {
                // Eliminar el avatar anterior si existe
                Storage::disk('public')->delete($empleado->avatar);
            }

        if ($empleado) {
            $empleado->delete();
        }

        if ($usuario) {
            $usuario->delete();
        }

        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado exitosamente.');

    }
}
