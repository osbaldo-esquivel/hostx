@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Hostname</div>
                <div class="card-body">
                    <form action="/api/hostnames?id={{ $hostname->id }}&from=app" method="POST">
                        @csrf
                        @method("PUT")
                        <label for="domain">Domain</label>
                        <input type="text" id="domain" name="domain" class="form-control mb-3" value="{{ $hostname->domain }}" required>
                        <label for="tld">TLD</label>
                        <select id="tld" name="tld" class="form-control mb-3">
                            @foreach(['ddns.net', 'hopto.org', 'webhop.me'] as $tld)
                                <option value="{{ $tld }}" {{ $hostname->tld === $tld ? 'selected' : '' }}>{{ $tld }}</option>
                            @endforeach
                        </select>
                        <label for="type">Type</label>
                        <select id="type" name="type" class="form-control mb-3" required>
                            @foreach(['A','CNAME','AAAA'] as $type)
                                <option value="{{ $type }}" {{ $hostname->type === $type ? 'selected' : '' }}>{{ $type }}</option>
                            @endforeach
                        </select>
                        <label for="user">User</label>
                        <select id="user" name="user_id" class="form-control mb-3" required>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $hostname->user_id === $user->id ? 'selected' : '' }}>{{ $user->username }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-primary mb-3" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection