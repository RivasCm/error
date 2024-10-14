<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function assignRole(Request $request, $userId)
    {
        // Validar la solicitud para asegurarse de que contiene un rol válido
        $request->validate([
            'role' => 'required|exists:roles,name', // Verifica que el rol exista
        ]);

        // Obtener el usuario por su ID
        $user = User::findOrFail($userId);

        // Asignar el rol al usuario
        $user->assignRole($request->input('role'));

        // Redireccionar de vuelta con un mensaje de éxito
        return redirect()->back()->with('success', 'Rol asignado exitosamente');
    }
    public function showAssignRoleForm($userId)
    {
        $user = User::findOrFail($userId);
        return view('usuarios.asignar-rol', compact('user'));
    }

}
