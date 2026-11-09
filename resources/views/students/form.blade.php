<!DOCTYPE html>
<html>
<head>
    <title>Student Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>{{ $student->exists ? 'Edit' : 'Add' }} Student</h2>
    @foreach($errors->all() as $e) <div class="alert alert-danger">{{ $e }}</div> @endforeach
    <form method="POST" action="{{ $student->exists ? '/students/'.$student->id : '/students' }}">
        @csrf
        @if($student->exists) @method('PUT') @endif
        <input class="form-control mb-2" name="name" placeholder="Name" value="{{ old('name', $student->name) }}">
        <input class="form-control mb-2" name="email" placeholder="Email" value="{{ old('email', $student->email) }}">
        <input class="form-control mb-2" name="course" placeholder="Course" value="{{ old('course', $student->course) }}">
        <button class="btn btn-success">Save</button>
        <a href="/students" class="btn btn-secondary">Back</a>
    </form>
</body>
</html>