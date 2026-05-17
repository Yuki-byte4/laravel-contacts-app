@extends('layouts.layout')

@section('title', 'Contact List')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>List of Contacts</h2>
        <a href="{{ route('contacts.create') }}" class="btn btn-success">Add Contact</a>
        <a href="{{ route('contacts.trashed') }}" class="btn btn-warning">Show Deleted</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->phone }}</td>

                <td>
                    <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-primary btn-sm">Edit</a>

                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $contacts->links() }}
@endsection
