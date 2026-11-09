<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Students</h2>
    @if(session('ok')) <div class="alert alert-success">{{ session('ok') }}</div> @endif
    <a href="/students/create" class="btn btn-primary mb-3">Add Student</a>
    <table class="table table-bordered">
        <tr><th>ID</th><th>Name</th><th>Email</th><th>Course</th><th>Action</th></tr>
        @foreach($students as $s)
        <tr>
            <td>{{ $s->id }}</td><td>{{ $s->name }}</td><td>{{ $s->email }}</td><td>{{ $s->course }}</td>
            <td>
                <a href="/students/{{ $s->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                <form action="/students/{{ $s->id }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>