<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id(); // Primary Key, тип BIGINT UNSIGNED
            $table->string('title', 50); // Название группы, тип VARCHAR, ограничим до 50 символов
            $table->date('start_from'); // Дата начала обучения, тип DATE
            $table->boolean('is_active')->default(false); // Статус группы, тип BOOLEAN
            $table->timestamps(); // created_at и updated_at, тип TIMESTAMP
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
