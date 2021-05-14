@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit user</div>
                <div class="card-body">
                    <form action="/api/users?id={{ $user->id }}&from=app" method="POST">
                        @csrf
                        @method("PUT")
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control mb-3" value="{{ $user->username }}" required>
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" class="form-control mb-3" value="{{ $user->email }}" required>
                        <label for="role">Role</label>
                        <select id="role" name="role_id" class="form-control mb-3" required>
                            @foreach([1=>'owner',2=>'admin',3=>'billing',4=>'installer'] as $role_id => $role_name)
                                <option value="{{ $role_id }}" {{ $user->role_id === $role_id ? 'selected' : '' }}>{{ $role_name }}</option>
                            @endforeach
                        </select>
                        <label for="status">Status</label>
                        <select id="status" name="status" class="form-control mb-3" required>
                            @foreach(['active','inactive','unconfirmed','limited'] as $status)
                                <option value="{{ strtoupper($status) }}" {{ strtolower($user->status) === $status ? 'selected' : '' }}>{{ $status }}</option>
                            @endforeach
                        </select>
                        <label for="affiliate">Affiliate</label>
                        <input type="text" id="affiliate" name="affiliate" class="form-control mb-3" value="{{ $user->affiliate_id }}" required>
                        <input type="hidden" value="{{ $user->team_id }}" name="team_id">
                        <button class="btn btn-primary mb-3" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection