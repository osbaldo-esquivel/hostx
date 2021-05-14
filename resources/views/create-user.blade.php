@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create user</div>
                <div class="card-body">
                    <form action="/api/users?from=app" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control mb-3" required>
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control mb-3" required>
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" class="form-control mb-3" required>
                            <label for="role">Role</label>
                            <select id="role" name="role_id" class="form-control mb-3" required>
                                @foreach(['owner'=>1,'admin'=>2, 'billing'=>3, 'installer'=>4] as $role => $role_id)
                                    <option value="{{ $role_id }}">{{ $role }}</option>
                                @endforeach
                            </select>
                            <label for="affiliate">Affiliate</label>
                            <input type="text" id="affiliate" name="affiliate_id" class="form-control mb-3" required>
                            <input type="hidden" name="team_id" value="{{ Auth::user()->getTeam()->id }}">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection