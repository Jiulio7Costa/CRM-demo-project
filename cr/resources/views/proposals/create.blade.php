@extends('layouts.app')

@section('content')
    <h1>Create New Proposal</h1>
    <form action="{{ route('proposals.store') }}" method="POST">
        @csrf
        <div>
            <label>Title</label>
            <input type="text" name="title" required>
        </div>
        <div>
            <label>Description</label>
            <textarea name="description" required></textarea>
        </div>
        <button type="submit">Create</button>
    </form>
@endsection
