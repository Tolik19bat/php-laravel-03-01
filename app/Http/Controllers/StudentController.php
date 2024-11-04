<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Group;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Отображение списка всех студентов
        return Student::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Group $group)
    {
        // Отображает страницу для добавления студента в группу
        return view('students.create', ['group' => $group]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Group $group)
    {
        // Валидация и создание нового студента
        $validated = $request->validate([
            'group_id' => 'required|exists:groups,id',
            'surname' => 'required|string|max:50',
            'name' => 'required|string|max:50',
        ]);

        $student = $group->students()->create($validated);

        // Перенаправление на страницу группы после создания студента
        return redirect()->route('groups.show', $group);
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group, Student $student)
    {
        // Отображает информацию о студенте
        return view('students.show', ['group' => $group, 'student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
       // Отображение формы для редактирования студента (для веб-интерфейса)
       return view('students.edit', ['student' => $student, 'groups' => Group::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        // Валидация и обновление данных студента
        $validated = $request->validate([
            'group_id' => 'required|exists:groups,id',
            'surname' => 'required|string|max:50',
            'name' => 'required|string|max:50',
        ]);

        $student->update($validated);

        return response()->json($student);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        // Удаление студента
        $student->delete();

        return response()->json(['message' => 'Student deleted successfully']);
    }
}
