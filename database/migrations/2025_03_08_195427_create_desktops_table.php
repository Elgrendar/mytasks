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
        Schema::create('desktops', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Campo para el nombre del escritorio
            $table->string('color')->nullable(); // Campo opcional para el color
            $table->text('description')->nullable(); // Campo para descripción
            //$table->foreignId('owner_id')->default('1')->constrained('user')->onDelete('cascade'); // Relación con Users
            $table->timestamps(); // Campos created_at y updated_at
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desktops');
    }
};
