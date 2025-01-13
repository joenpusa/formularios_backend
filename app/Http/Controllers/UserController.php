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
            'chk_social_all' => $request->chk_social_all ?? false,
            'chk_reportes' => $request->chk_reportes ?? false,
            'chk_reportes_all' => $request->chk_reportes_all ?? false,
            'chk_usuarios' => $request->chk_usuarios ?? false,
            'chk_tecnico' => $request->chk_tecnico ?? false,
            'chk_tecnico_all' => $request->chk_tecnico_all ?? false,
            'chk_galeria' => $request->chk_galeria ?? false,
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
            'chk_social_all' => $request->chk_social_all ?? false,
            'chk_reportes' => $request->chk_reportes ?? false,
            'chk_reportes_all' => $request->chk_reportes_all ?? false,
            'chk_usuarios' => $request->chk_usuarios ?? false,
            'chk_tecnico' => $request->chk_tecnico ?? false,
            'chk_tecnico_all' => $request->chk_tecnico_all ?? false,
            'chk_galeria' => $request->chk_galeria ?? false,
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

    public function resetPassword(Request $request, $id)
    {
        try {
            // Buscar al usuario por ID
            $user = User::findOrFail($id);

            // Generar una nueva contraseña
            $newPassword = Str::random(10);

            // Actualizar la contraseña en la base de datos
            $user->password = Hash::make($newPassword);
            $user->save();

            // Enviar el correo con la nueva contraseña
            Mail::send('emails.reset-password', ['user' => $user, 'password' => $newPassword], function ($message) use ($user) {
                $message->to($user->email)
                    ->subject('Restablecimiento de contraseña');
            });

            return response()->json([
                'success' => true,
                'message' => 'La contraseña se ha restablecido y enviado por correo.',
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'No se pudo restablecer la contraseña. Inténtelo de nuevo.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function toggleActive($id)
    {
        try {
            // Buscar al usuario por ID
            $user = User::findOrFail($id);

            // Cambiar el estado del usuario
            $user->is_active = !$user->is_active;
            $user->save();

            $message = $user->is_active
                ? 'El usuario ha sido habilitado.'
                : 'El usuario ha sido deshabilitado.';

            return response()->json([
                'success' => true,
                'message' => $message,
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
