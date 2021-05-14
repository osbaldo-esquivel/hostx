@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Billing page</div>
                <div class="card-body">
                    <div>
                        <p>Invoice 12345</p>
                        <p>Amount: $139.65</p>
                        <p>Payment method: ***********1234</p>
                        <p>Exp: 01/27</p>
                    </div>
                    <hr />
                    <div>
                        <p>Invoice 12346</p>
                        <p>Amount: $48.27</p>
                        <p>Payment method: ***********1234</p>
                        <p>Exp: 01/27</p>
                    </div>
                    <hr />
                    <div>
                        <p>Invoice 12347</p>
                        <p>Amount: $212.12</p>
                        <p>Payment method: ***********1234</p>
                        <p>Exp: 01/27</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection