@extends('layouts.app')

@section('content')
    <h1>Edit Customer</h1>
    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ $customer->name }}" required>
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ $customer->email }}" required>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
