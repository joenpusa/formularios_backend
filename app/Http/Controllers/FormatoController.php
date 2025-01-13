<?php

namespace App\Http\Controllers;

use App\Models\Formato;
use Illuminate\Http\Request;

class FormatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formatos = Formato::paginate(10);
        return response()->json($formatos, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo_formato' => 'required|unique:formatos,codigo_formato',
            'nombre_formato' => 'required|string',
            'habilitado' => 'required|boolean',
        ]);

        $formato = Formato::create($validated);

        return response()->json($formato, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $formato = Formato::find($id);

        if (!$formato) {
            return response()->json(['error' => 'Formato no encontrado'], 404);
        }

        return response()->json($formato, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $formato = Formato::find($id);

        if (!$formato) {
            return response()->json(['error' => 'Formato no encontrado'], 404);
        }

        $validated = $request->validate([
            'codigo_formato' => 'required|unique:formatos,codigo_formato,' . $id,
            'nombre_formato' => 'required|string',
            'habilitado' => 'required|boolean',
        ]);

        $formato->update($validated);

        return response()->json($formato, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $formato = Formato::find($id);

        if (!$formato) {
            return response()->json(['error' => 'Formato no encontrado'], 404);
        }

        $formato->delete();

        return response()->json(['message' => 'Formato eliminado correctamente'], 200);
    }
}
