@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger" role="alert">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    <img height="40px" width="60px" src="/images/{{ Auth::user()->getTeamName() }}.png">
                    Welcome, {{ ucfirst(Auth::user()->username) }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
