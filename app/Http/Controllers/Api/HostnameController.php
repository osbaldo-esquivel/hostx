<?php namespace App\Http\Controllers\Api;

use App\Hostname;
use Illuminate\Http\Request;

class HostnameController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        return Hostname::all();
    }

    public function show(Request $request)
    {
        $hostname = Hostname::find($request->id);

        return $hostname;
    }

    public function store(Request $request)
    {
        $hostname = Hostname::create($request->all());

        if (strpos($request->fullUrl(), 'from=app') !== false) {
            $hostnames = Hostname::where('user_id', $request->user()->id)->get();

            return view('hostnames', ['hostnames' => $hostnames])
                ->with('success', 'Hostname created successfully');
        }

        return response()->json($hostname, 201);
    }

    public function update(Request $request)
    {
        $hostname = Hostname::find($request->id);

        $hostname->update($request->all());

        if (strpos($request->fullUrl(), 'app') !== false) {
            $hostnames = Hostname::where('user_id', $request->user()->id)->get();

            return view('hostnames', ['hostnames' => $hostnames])
                ->with('success', 'Hostname updated successfully');
        }

        return response()->json($hostname, 200);
    }

    public function delete(Request $request)
    {
        $hostname = Hostname::find($request->id);

        $hostname->delete();

        if (strpos($request->fullUrl(), 'from=app') !== false) {
            $hostnames = Hostname::where('user_id', $request->user()->id)->get();

            return view('hostnames', ['hostnames' => $hostnames])
                ->with('success', 'Hostname deleted successfully');
        }

        return response()->json(null, 204);
    }
}