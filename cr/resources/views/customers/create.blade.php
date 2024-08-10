@extends('layouts.app')

@section('content')
    <h1>Create New Customer</h1>
    <form action="{{ route('customers.store') }}" method="POST">
        @csrf
        <div>
            <label>Name</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" required>
        </div>
        <button type="submit">Create</button>
    </form>
@endsection
