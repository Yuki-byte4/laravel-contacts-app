<!DOCTYPE html>
<html>
<head>
    <title>Add Contact</title>
</head>
<body>
    <h2>Add Contact</h2>

    @if ($errors->any())
        <ul style="color:red">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('contacts.store') }}">
        @csrf

        <label>Name:</label>
        <input type="text" name="name" required><br>

        <label>Phone:</label>
        <input type="text" name="phone" required><br>

        <button type="submit">Save</button>
    </form>
</body>
</html>
