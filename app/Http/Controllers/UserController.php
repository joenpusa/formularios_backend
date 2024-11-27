<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Validación de autorización si usas políticas
        // $this->authorize('viewAny', User::class);

        $users = User::paginate(10);

        return response()->json($users, 200);
    }
}
