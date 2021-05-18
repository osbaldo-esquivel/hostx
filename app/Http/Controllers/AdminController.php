<?php namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $team_id = $request->user()->getTeam()->id;

        $users = $request->user()->is_admin
            ? User::where('team_id', $team_id)
                ->get()
            : collect([]);

        return view('admin', ['users' => $users]);
    }

    public function create(Request $request)
    {
        if (! $request->user()->is_admin) {
            return back()->withErrors(['error' => 'Not an admin']);
        }

        return view('create-user');
    }

    public function edit(Request $request)
    {
        if (! $request->user()->is_admin) {
            return back()->withErrors(['error' => 'Not an admin']);
        }

        $user = User::find($request->id);

        return view('edit-user', ['user' => $user]);
    }
}