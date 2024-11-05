@extends('layouts.app')

@section('title', 'Создать новую группу')

@section('content')
<h1>Создать новую группу</h1>

<form action="{{ route('groups.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Название группы</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="mb-3">
        <label for="start_from" class="form-label">Дата начала</label>
        <input type="date" class="form-control" id="start_from" name="start_from" required>
    </div>
    <div class="mb-3">
        <label for="is_active" class="form-label">Активная группа?</label>
        <select class="form-control" id="is_active" name="is_active" required>
            <option value="1">Да</option>
            <option value="0">Нет</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Сохранить</button>
    <a href="{{ route('groups.index') }}" class="btn btn-secondary">Назад</a>
</form>
@endsection