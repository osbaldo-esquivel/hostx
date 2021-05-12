<?php namespace App\Http\Controllers\Api;

use App\Hostname;
use Illuminate\Http\Request;

class HostnameController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        return Hostname::all();
    }

    public function show(Hostname $hostname)
    {
        return $hostname;
    }

    public function store(Request $request)
    {
        $hostname = Hostname::create($request->all());

        return response()->json($hostname, 201);
    }

    public function update(Request $request, Hostname $hostname)
    {
        $hostname->update($request->all());

        return response()->json($hostname, 200);
    }

    public function delete(Hostname $hostname)
    {
        $hostname->delete();

        return response()->json(null, 204);
    }
}