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
    Schema::create('projects', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Nombre del proyecto
        $table->text('description')->nullable(); // Descripción opcional
        $table->enum('status', ['no_iniciado', 'en_progreso', 'completado', 'abandonado'])->default('no_iniciado'); // Estado del proyecto
        $table->foreignId('desktop_id')->constrained('desktops')->onDelete('cascade'); // Relación con Escritorio
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
