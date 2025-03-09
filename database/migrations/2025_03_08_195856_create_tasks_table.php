<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Título de la tarea
            $table->text('description')->nullable(); // Descripción opcional
            $table->enum('status', ['no_iniciada', 'en_progreso', 'finalizada', 'abandonada'])->default('no_iniciada'); // Estado de la tarea
            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade'); // Relación con Proyecto
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
