@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Hostname</div>
                <div class="card-body">
                    <form action="/hostnames/create" method="POST">
                        <div class="form-group">
                            <label for="name">Hostname</label>
                            <input type="text" id="name" name="name" class="form-control mb-3">
                            <label for="domain">Domain</label>
                            <select id="domain" name="domain" class="form-control mb-3">
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
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection