<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id(); // Primary Key, тип BIGINT UNSIGNED
            $table->foreignId('group_id')->constrained('groups')->onDelete('cascade'); // Внешний ключ на groups, тип BIGINT UNSIGNED
            $table->string('surname', 50); // Фамилия студента, тип VARCHAR, ограничим до 50 символов
            $table->string('name', 50); // Имя студента, тип VARCHAR, ограничим до 50 символов
            $table->timestamps(); // created_at и updated_at, тип TIMESTAMP
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
