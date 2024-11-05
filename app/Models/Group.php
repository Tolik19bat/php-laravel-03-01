<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'start_from', 'is_active'];

    /**
     * Установить отношение "один ко многим" с моделью Student
     */
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
