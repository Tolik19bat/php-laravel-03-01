@extends('layouts.app')

@section('title', $student->surname . ' ' . $student->name)

@section('content')
<h1>{{ $student->surname }} {{ $student->name }}</h1>
<p>ID Группы: {{ $student->group_id }}</p>

<a href="{{ route('groups.show', $group) }}" class="btn btn-secondary">Назад к группе</a>

<form action="{{ route('students.destroy', [$group, $student]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button style="margin-top: 1rem;" type="submit" class="btn btn-danger">Удалить студента</button>
</form>
@endsection