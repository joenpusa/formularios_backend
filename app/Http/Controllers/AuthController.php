<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Registro de usuario
    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return response()->json([
            'message' => 'Registro de usuario exitoso',
        ], 201);
    }

    // Inicio de sesión
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Credenciales incorrectas'
            ], 401);
        }

        // Crear token
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
            ],
            'permisos' => [
                'chk_social' => (bool) $user->chk_social,
                'chk_tecnico' => (bool) $user->chk_tecnico,
                'chk_reportes' => (bool) $user->chk_reportes,
                'chk_usuarios' => (bool) $user->chk_usuarios,
                'chk_galeria' => (bool) $user->chk_galeria,
                'chk_diagnosticos' => (bool) $user->chk_diagnosticos,
            ],
        ]);
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        // Revocar el token actual
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Sesión cerrada exitosamente'
        ]);
    }

    public function refreshToken(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
        ]);

        $existingToken = $request->user()->tokens()->where('id', $request->token)->first();

        if (!$existingToken) {
            return response()->json(['message' => 'Token inválido'], 401);
        }

        // Opcional: Verificar si el token está cerca de expirar
        // Aquí asumimos que quieres renovar siempre
        $existingToken->delete();

        $newToken = $request->user()->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $newToken,
            'token_type' => 'Bearer',
        ]);
    }
}
