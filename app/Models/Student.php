<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['group_id', 'surname', 'name'];

    /**
     * Установить отношение "многие к одному" с моделью Group
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
