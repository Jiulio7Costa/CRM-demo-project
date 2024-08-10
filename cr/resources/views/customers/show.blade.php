@extends('layouts.app')

@section('content')
    <h1>Customer Details</h1>
    <p>Name: {{ $customer->name }}</p>
    <p>Email: {{ $customer->email }}</p>
    <a href="{{ route('customers.edit', $customer->id) }}">Edit</a>
@endsection
