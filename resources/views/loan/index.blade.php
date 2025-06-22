@extends('layouts.app')
@section('content')
<div class="card shadow">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Loan Details</h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>Client ID</th>
                    <th>Num of Payments</th>
                    <th>First Payment Date</th>
                    <th>Last Payment Date</th>
                    <th>Loan Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($loans as $loan)
                <tr>
                    <td>{{ $loan->clientid }}</td>
                    <td>{{ $loan->num_of_payment }}</td>
                    <td>{{ $loan->first_payment_date }}</td>
                    <td>{{ $loan->last_payment_date }}</td>
                    <td>₹{{ number_format($loan->loan_amount, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection