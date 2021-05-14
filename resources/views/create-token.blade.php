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
                <div class="card-header">Create API token</div>
                <div class="card-body">
                    <form method="POST" action="/admin/users/create-token">
                        @csrf
                        <label for="permissions">Select permissions</label>
                        <select id="permissions" name="permissions[]" class="form-control mb-3" multiple required>
                            @foreach($permissions as $permission)
                                <option value="{{ $permission }}">{{ $permission }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <button type="submit" class="btn btn-primary mb-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection