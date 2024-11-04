@extends('layouts.app')

@section('title', 'Список групп')

@section('content')
    <h1>Список групп</h1>
    <a href="{{ route('groups.create') }}" class="btn btn-primary mb-3">Создать новую группу</a>

    <ul class="list-group">
        @foreach ($groups as $group)
            <li class="list-group-item">
                <a href="{{ route('groups.show', $group) }}">{{ $group->title }}</a>
            </li>
        @endforeach
    </ul>
@endsection
