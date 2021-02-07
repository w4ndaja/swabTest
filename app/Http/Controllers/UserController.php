<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('pages.user.index', compact('users'));
    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function edit(User $user)
    {
        return view('pages.user.edit', compact('user'));
    }

    public function update(User $user)
    {
        request()->validate([
            'name' => 'required|string',
            'username' => 'required|string|unique:users,username,'.$user->id,
            'password' => 'sometimes|string|confirmed',
        ]);
        $user->update([
            'name' => request()->name,
            'username' => request()->username,
            'password' => request()->password ? bcrypt(request()->password) : $user->password,
        ]);
        return back()->with('success', 'Pengguna berhasil diperbaharui');
    }

    public function store()
    {
        request()->validate([
            'name' => 'required|string',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|confirmed|string',
        ]);
        
        User::create([
            'name' => request()->name,
            'username' => request()->username,
            'password' => bcrypt(request()->password),
            'role' => 'admin',
        ]);

        return back()->with('success', 'Pengguna berhasil ditambah');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'Pengguna berhasil dihapus');
    }

    public function confirmDelete(User $user)
    {
    return view('pages.user.delete', compact('user'));
    }

}
