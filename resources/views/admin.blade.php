@extends('layouts.app')

@section('content')
<div class="container">
    @if(! empty($success))
        <div class="alert alert-success" role="alert">
            {{ $success }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin page</div>
                <div class="card-body">
                    <div>
                        <a href="/admin/user/create">
                            <button class="btn btn-primary mb-2">Create user</button>
                        </a>
                    </div>
                    <hr />
                    @foreach($users as $user)
                        <div>
                            <p>Name: {{ $user->username }}</p>
                            <p>Email: {{ $user->email }}</p>
                            <p>Role: {{ ucfirst($user->getRoleName()) }}</p>
                            <p>Status: {{ ucfirst(strtolower($user->status)) }}</p>
                            <p>Affiliate: {{ $user->affiliate_id }}</p>
                        </div>
                        <a href="/admin/user/edit?id={{ $user->id }}">
                            <button class="btn btn-primary mb-2">Edit user</button>
                        </a>
                        <form action="/api/users?id={{ $user->id }}&from=app" method="POST">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger mb-2" type="submit">Delete user</button>
                        </form>
                        <hr />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection