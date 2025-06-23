@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Loan EMI Calculator</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('emi.calculate') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Loan Amount</label>
                        <input type="number" step="0.01" name="loan_amount" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Number of Payments (EMI)</label>
                        <input type="number" name="num_of_payment" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">First Payment Date</label>
                        <input type="date" name="first_payment_date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Last Payment Date</label>
                        <input type="date" name="last_payment_date" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Calculate EMI</button>
                </form>
                @if(session('emi'))
                    <div class="alert alert-info mt-3">
                        <strong>Calculated EMI:</strong> ₹{{ session('emi') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection