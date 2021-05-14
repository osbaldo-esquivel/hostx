<?php namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        return User::all();
    }

    public function show(User $user)
    {
        return $user;
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($data['role_id'] === 2) {
            $data['is_admin'] = true;
        }

        $user = User::create($data);

        if (strpos($request->fullUrl(), 'from=app') !== false) {
            $users = User::where('team_id', $request->user()->getTeam()->id)->get();

            return view('admin', ['users' => $users])
                ->with('success', 'User created successfully');
        }

        return response()->json($user, 201);
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        $data = $request->all();

        if ($data['role_id'] === 2) {
            $data['is_admin'] = true;
        }

        $data['password'] = Hash::make($data['password']);

        $user->update($data);

        if (strpos($request->fullUrl(), 'app') !== false) {
            $users = User::where('team_id', $request->user()->getTeam()->id)->get();

            return view('admin', ['users' => $users])
                ->with('success', 'User updated successfully');
        }

        return response()->json($user, 200);
    }

    public function delete(Request $request)
    {
        $user = User::find($request->id);

        $user->delete();

        if (strpos($request->fullUrl(), 'from=app') !== false) {
            $users = User::where('team_id', $request->user()->getTeam()->id)->get();

            return view('admin', ['users' => $users])
                ->with('success', 'User deleted successfully');
        }

        return response()->json(null, 204);
    }
}