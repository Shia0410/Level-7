<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
</head>
<body>
    <h1>Edit Item</h1>
    <form action="{{ route('items.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $item->name }}" required>
        <label for="description">Description:</label>
        <textarea id="description" name="description">{{ $item->description }}</textarea>
        <button type="submit">Update</button>
    </form>
</body>
</html>
