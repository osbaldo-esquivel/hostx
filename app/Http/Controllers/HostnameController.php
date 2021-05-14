<?php namespace App\Http\Controllers;

use App\Hostname;
use App\User;
use Illuminate\Http\Request;

class HostnameController extends Controller
{
    public function index(Request $request)
    {
        $team_id = $request->user()->getTeam()->id;

        $admin_users = User::whereIn('role_id', [1,2])
            ->where('team_id', $team_id)
            ->get();
            
        $installer_users = User::where('role_id', 3)
            ->where('team_id', $team_id)
            ->get();

        $hostnames = $request->user()->is_admin
            ? Hostname::whereIn('user_id', $admin_users)
            : Hostname::whereIn('user_id', $installer_users);

        return view('hostnames', ['hostnames' => $hostnames]);
    }

    public function create(Request $request)
    {
        return view('create-hostname');
    }

    public function edit(Request $request)
    {
        $team_id = $request->user()->getTeam()->id;
        $users = User::where('team_id', $team_id)->get();
        $hostname = Hostname::find($request->id);

        return view('edit-hostname', [
            'users' => $users,
            'hostname' => $hostname,
        ]);
    }
}