<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@extends('layouts.app')

@section('content')
<h1 class="mb-4">{{ isset($student) ? 'Modifier Étudiant' : 'Ajouter Étudiant' }}</h1>

<form method="POST" action="{{ isset($student) ? route('students.update', $student->id) : route('students.store') }}">
    @csrf
    @if(isset($student))
        @method('PUT')
    @endif

    <div class="mb-3">
        <label class="form-label">Nom</label>
        <input type="text" name="name" class="form-control" value="{{ $student->name ?? '' }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ $student->email ?? '' }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Age</label>
        <input type="number" name="age" class="form-control" value="{{ $student->age ?? '' }}">
    </div>

    <button type="submit" class="btn btn-success">{{ isset($student) ? 'Modifier' : 'Ajouter' }}</button>
</form>
@endsection

</body>
</html>
