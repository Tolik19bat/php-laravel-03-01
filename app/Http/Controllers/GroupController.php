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
        // Отображение списка групп
        return Group::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Отображение формы для создания новой группы
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

        return Group::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
         // Отображение конкретной группы
         return $group;
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
