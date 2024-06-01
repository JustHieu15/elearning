<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::join('role', 'role.id', '=', 'users.role_id')
            ->select('users.*', 'role.name as role_name', 'role.id as role_id')
            ->get();

        return view('admin.user.index', compact('users'));
    }

    public function edit(Request $request, $id)
    {
        $request->session()->put('user_id', $id);

        $user = User::join('role', 'role.id', '=', 'users.role_id')
            ->select('users.*', 'role.name as role_name', 'role.id as role_id')
            ->where('users.id', $id)
            ->first();

        $roles = Role::all();

        return view('admin.user.edit', compact('user', 'roles'));
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $userId = $request->session()->get('user_id');

        $updateUser = User::where('id', $userId);

        if ($updateUser) {
            $updateUser->update([
                'role_id' => $data['role_id'],
            ]);

            return redirect()->route('admin.user.index')->with('success', 'User updated successfully');
        }

        return redirect()->route('admin.user.index')->with('error', 'Something went wrong');
    }
}
