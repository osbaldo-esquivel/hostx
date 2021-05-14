<?php namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $team_id = $request->user()->getTeam()->id;

        $users = User::where('team_id', $team_id)->get();
        return view('admin', ['users' => $users]);
    }

    public function create()
    {
        return view('create-user');
    }

    public function edit(Request $request)
    {
        $user = User::find($request->id);

        return view('edit-user', ['user' => $user]);
    }

    public function createToken(Request $request)
    {
        $user = User::find($request->id);
        $permissions = [
            'hostnames:read',
            'hostnames:write',
            'billing:read',
            'admin:read',
            'admin:write',
            'admin:all'
        ];
        
        return view('create-token', [
            'user' => $user,
            'permissions' => $permissions,
        ]);
    }

    public function generateToken(Request $request)
    {
        $user = User::find($request->user_id);
        $permissions = $request->permissions;

        $token = $user->createToken('eski', $permissions)->plainTextToken;

        $user->setToken($token);
        
        return back()->withSuccess("Token created successfully: $token");
    }
}