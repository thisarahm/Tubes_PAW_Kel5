<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function create(Request $request)
    {
        // Validasi request jika diperlukan
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        // Simpan data baru ke dalam tabel users
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password')); 
        $user->save();

        return response()->json(['message' => 'User created successfully', 'data' => $user], 201);
    }

    public function read()
    {
        // Mengambil semua data users
        $users = User::all();

        return response()->json(['data' => $users], 200);
    }

    public function update(Request $request, $id)
    {
        // Validasi request jika diperlukan
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        // Cari user berdasarkan ID
        $user = User::findOrFail($id);

        // Update data user
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        // Anda bisa menambahkan update untuk password juga jika dibutuhkan

        $user->save();

        return response()->json(['message' => 'User updated successfully', 'data' => $user], 200);
    }

    public function delete($id)
    {
        // Cari user berdasarkan ID
        $user = User::findOrFail($id);

        // Hapus user
        $user->delete();

        return response()->json(['message' => 'User deleted successfully'], 200);
    }
}