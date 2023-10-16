@extends('include.header')

@section('payments.create')
<div class="container">
    <h2>Update Payment</h2>
    <form method="POST" action="">
        @csrf

        <div class="form-group">
            <label for="payment_for">Payment Type</label>
            <select name="payment_for" class="form-control" required>
                <option value="monthly_rent" @if ($payment->payment_for == 'monthly_rent') selected @endif>Monthly Rent</option>
                <option value="violation" @if ($payment->payment_for == 'violation') selected @endif>Violation</option>
            </select>
        </div>

        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="text" name="amount" class="form-control" value="{{ $payment->amount }}" required>
        </div>

        <div class="form-group">
            <label for="status">Payment Status</label>
            <select name="status" class="form-control" required>
                <option value="unpaid" @if ($payment->status == 'unpaid') selected @endif>Unpaid</option>
                <option value="paid_violation" @if ($payment->status == 'paid_violation') selected @endif>Paid for Violation</option>
                <option value="paid_monthly_rent" @if ($payment->status == 'paid_monthly_rent') selected @endif>Paid for Monthly Rent</option>
                <option value="paid_in_full" @if ($payment->status == 'paid_in_full') selected @endif>Paid in Full</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Payment</button>
    </form>
</div>
@endsection
