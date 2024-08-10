@extends('layouts.app')

@section('content')
    <h1>Customers List</h1>
    <a href="{{ route('customers.create') }}">Create New Customer</a>
    <ul>
        @foreach ($customers as $customer)
            <li><a href="{{ route('customers.show', $customer->id) }}">{{ $customer->name }}</a></li>
        @endforeach
    </ul>
@endsection
