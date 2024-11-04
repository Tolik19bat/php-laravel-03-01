@extends('layouts.app')

@section('title', 'Добавить студента')

@section('content')
    <h1>Добавить студента в группу {{ $group->title }}</h1>

    <form action="{{ route('students.store', $group) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="surname" class="form-label">Фамилия</label>
            <input type="text" class="form-control" id="surname" name="surname" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
        <a href="{{ route('groups.show', $group) }}" class="btn btn-secondary">Назад к группе</a>
    </form>
@endsection
