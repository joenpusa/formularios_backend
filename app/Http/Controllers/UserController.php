<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Listar usuarios con búsqueda y paginación.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $users = User::search($search)->paginate(10);

        return response()->json([
            'success' => true,
            'message' => 'Usuarios obtenidos correctamente.',
            'data' => $users,
        ], 200);
    }

    /**
     * Guardar un nuevo usuario.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'tipo_documento' => 'required|string|max:255',
            'num_documento' => 'required|string|unique:users,num_documento',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'tipo_documento' => $validatedData['tipo_documento'],
            'num_documento' => $validatedData['num_documento'],
            'password' => Hash::make($validatedData['num_documento']),
            'chk_social' => $request->chk_social ?? false,
            'chk_reportes' => $request->chk_reportes ?? false,
            'chk_usuarios' => $request->chk_usuarios ?? false,
            'chk_tecnico' => $request->chk_tecnico ?? false,
            'chk_galeria' => $request->chk_galeria ?? false,
            'chk_diagnosticos' => $request->chk_diagnosticos ?? false,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Usuario creado correctamente.',
            'data' => $user,
        ], 201);
    }

    /**
     * Actualizar un usuario existente.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'tipo_documento' => 'required|string|max:255',
            'num_documento' => 'required|string|unique:users,num_documento,' . $user->id,
        ]);

        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'tipo_documento' => $validatedData['tipo_documento'],
            'num_documento' => $validatedData['num_documento'],
            'chk_social' => $request->chk_social ?? false,
            'chk_reportes' => $request->chk_reportes ?? false,
            'chk_usuarios' => $request->chk_usuarios ?? false,
            'chk_tecnico' => $request->chk_tecnico ?? false,
            'chk_galeria' => $request->chk_galeria ?? false,
            'chk_diagnosticos' => $request->chk_diagnosticos ?? false,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Usuario actualizado correctamente.',
            'data' => $user,
        ], 200);
    }

    /**
     * Mostrar un usuario específico.
     */
    public function show(User $user)
    {
        return response()->json([
            'success' => true,
            'message' => 'Usuario obtenido correctamente.',
            'data' => $user,
        ], 200);
    }

    /**
     * Restablecer contraseña: genera clave alfanumérica de 8 caracteres,
     * revoca tokens y devuelve la nueva clave en la respuesta.
     */
    public function resetPassword(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            // Generar contraseña alfanumérica de 8 caracteres (sin caracteres ambiguos)
            $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789';
            $newPassword = '';
            for ($i = 0; $i < 8; $i++) {
                $newPassword .= $chars[random_int(0, strlen($chars) - 1)];
            }

            // Guardar y revocar tokens
            $user->password = Hash::make($newPassword);
            $user->save();
            $user->tokens()->delete();

            // Intentar enviar correo (no bloquea si falla)
            try {
                Mail::send('emails.reset-password', ['user' => $user, 'password' => $newPassword], function ($msg) use ($user) {
                    $msg->to($user->email)->subject('Restablecimiento de contrasena');
                });
            } catch (\Exception $mailEx) {
                // Fallo de correo no bloquea la respuesta
            }

            return response()->json([
                'success' => true,
                'message' => 'Contrasena restablecida y sesiones cerradas.',
                'new_password' => $newPassword,
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'No se pudo restablecer la contrasena.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Activar o desactivar usuario. Al desactivar, revoca todos sus tokens.
     */
    public function toggleActive($id)
    {
        try {
            $user = User::findOrFail($id);

            $user->is_active = !$user->is_active;
            $user->save();

            // Revocar tokens al desactivar
            if (!$user->is_active) {
                $user->tokens()->delete();
            }

            $message = $user->is_active
                ? 'El usuario ha sido activado.'
                : 'El usuario ha sido desactivado y sus sesiones cerradas.';

            return response()->json([
                'success' => true,
                'message' => $message,
                'is_active' => $user->is_active,
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'No se pudo actualizar el estado del usuario.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
