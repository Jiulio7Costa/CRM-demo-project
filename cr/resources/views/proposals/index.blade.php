@extends('layouts.app')

@section('content')
    <h1>Proposals</h1>
    <a href="{{ route('proposals.create') }}">Create Proposal</a>
    <ul>
        @foreach ($proposals as $proposal)
            <li>
                <a href="{{ route('proposals.edit', $proposal->id) }}">{{ $proposal->title }}</a>
                <form action="{{ route('proposals.destroy', $proposal->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
