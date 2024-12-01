<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Enum\BranchEnum;
use App\Enum\RoleEnum;
use App\Enum\DepartmentEnum;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("users.index", ['users' => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("users.index", [
            'users' => User::all(),
            'page' => 'create',
            'departments' => DepartmentEnum::list(),
            'roles' => RoleEnum::list(),
            'branches' => BranchEnum::list(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'code' => 'required|numeric|unique:users,code',
            'department' => 'required|string',
            'branch' => 'required|string',
            'role' => 'required|string',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $data['password'] = Hash::make($data['password']);

        User::create($data);
        return redirect('users')->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view("users.index", [
            'users' => User::all(),
            'page' => 'edit',
            'current' => $user,
            'departments' => DepartmentEnum::list(),
            'roles' => RoleEnum::list(),
            'branches' => BranchEnum::list(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|string|min:3|max:255',
            'code' => ['required', 'numeric', Rule::unique('users', 'code')->ignore($user->id)],
            'department' => 'required|string',
            'branch' => 'required|string',
            'role' => 'required|string',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id), 'email', 'max:255'],
        ];

        if ($request->filled('password')) {
            $rules['password'] = 'required|string|min:8|confirmed';
        }

        $data = $request->validate($rules);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);
        return redirect('users')->with('success', 'User Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('users')->with('success', 'User Deleted successfully');
    }
}