@extends('layouts.app')

@section('content')
<div class="container">
    @if(! empty($success))
        <div class="alert alert-success" role="alert">
            {{ $success }}
        </div>
    @endif
    @if(count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <a href="/hostnames/create">
                    <button class="btn btn-primary">Create Hostname</button>
                </a>
                <div class="card-header">Hostnames</div>
                <div class="card-body">
                    @foreach($hostnames as $hostname)
                        <div>
                            <p>Domain: {{ $hostname->domain }}</p>
                            <p>TLD: {{ $hostname->tld }}</p>
                            <p>Type: {{ $hostname->type }}</p>
                            <p>User: {{ $hostname->getUser()->username }}</p>
                        </div>
                        <a href="/hostnames/edit?id={{ $hostname->id }}">
                            <button class="btn btn-primary mb-2">Edit</button>
                        </a>
                        <form action="/api/hostnames?id={{ $hostname->id }}&from=app" method="POST">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger mb-2" type="submit">Delete</button>
                        </form>
                        <hr />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection