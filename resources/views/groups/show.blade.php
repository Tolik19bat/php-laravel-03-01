@extends('layouts.app')

@section('title', $group->title)

@section('content')
<h1>{{ $group->title }}</h1>
<p>Дата начала: {{ $group->start_from }}</p>
<p>Активная: {{ $group->is_active ? 'Да' : 'Нет' }}</p>

<h2>Студенты группы</h2>
<a href="{{ route('students.create', $group) }}" class="btn btn-primary mb-3">Добавить студента</a>

@if ($students->isEmpty())
    <p>В этой группе пока нет студентов.</p>
@else
    <ul class="list-group">
        @foreach ($students as $student)
            <li class="list-group-item">
                <a href="{{ route('students.show', [$group, $student]) }}">
                    {{ $student->surname }} {{ $student->name }}
                </a>
            </li>
        @endforeach
    </ul>
@endif

<a href="{{ route('groups.index') }}" class="btn btn-secondary mt-3">Назад к списку групп</a>

<form action="{{ route('groups.destroy', $group) }}" method="POST">
    @csrf
    @method('DELETE')
    <button style="margin-top: 1rem;" type="submit" class="btn btn-danger">Удалить группу</button>
</form>

@endsection