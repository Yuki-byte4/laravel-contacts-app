<!DOCTYPE html>
<html>
<head>
    <title>Contacts</title>
</head>
<body>
    <h2>Contact List</h2>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <ul>
        @foreach($contacts as $contact)
            <li>{{ $contact->name }} - {{ $contact->phone }}</li>
        @endforeach
    </ul>

    <a href="{{ route('contacts.create') }}">Add New Contact</a>
</body>
</html>
