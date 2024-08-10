@extends('layouts.app')

@section('content')
    <h1>Edit Transaction</h1>
    <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div>
            <label>Amount</label>
            <input type="number" name="amount" value="{{ $transaction->amount }}" required>
        </div>
        <div>
            <label>Date</label>
            <input type="date" name="date" value="{{ $transaction->date }}" required>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
