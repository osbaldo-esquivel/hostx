@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Hostname</div>
                <div class="card-body">
                    <form action="/api/hostnames?from=app" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="domain">Hostname</label>
                            <input type="text" id="domain" name="domain" class="form-control mb-3">
                            <label for="tld">Domain</label>
                            <select id="tld" name="tld" class="form-control mb-3">
                                @foreach(['ddns.net', 'hopto.org', 'webhop.me'] as $tld)
                                    <option value="{{ $tld }}">{{ $tld }}</option>
                                @endforeach
                            </select>
                            <label for="type">Record Type</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" id="type" value="A">
                                    <label class="form-check-label" for="type">
                                      DNS Host (A)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" id="type" value="AAAA">
                                    <label class="form-check-label" for="type">
                                        AAAA (IPv6)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" id="type" value="CNAME">
                                    <label class="form-check-label" for="type">
                                        DNS Alias (CNAME)
                                    </label>
                                </div>
                            </div>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection