<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HostnameController extends Controller
{
    public function index(Request $request)
    {
        return view('hostnames');
    }

    public function create(Request $request)
    {
        return view('create-hostname');
    }
}