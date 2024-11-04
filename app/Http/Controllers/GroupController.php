<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // Отображает список всех групп с ссылкой на страницу создания новой группы
       $groups = Group::all();
       return view('groups.index', ['groups' => $groups]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Отображает страницу для создания новой группы
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Валидация и создание новой группы
        $validated = $request->validate([
            'title' => 'required|string|max:50',
            'start_from' => 'required|date',
            'is_active' => 'required|boolean',
        ]);

        $group = Group::create($validated);

        // Перенаправление на список групп после создания
        return redirect()->route('groups.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        // Отображает информацию о выбранной группе и список студентов этой группы
        return view('groups.show', ['group' => $group, 'students' => $group->students]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        // Отображение формы редактирования группы
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
          // Валидация и обновление данных группы
          $validated = $request->validate([
            'title' => 'required|string|max:50',
            'start_from' => 'required|date',
            'is_active' => 'required|boolean',
        ]);

        $group->update($validated);
        return $group;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        // Удаление группы
        $group->delete();
        return response()->json(['message' => 'Group deleted successfully']);
    }
}
