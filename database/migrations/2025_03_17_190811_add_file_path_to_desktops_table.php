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
    Schema::table('desktops', function (Blueprint $table) {
        $table->string('file_path')->nullable(); // Permitir nulo si no todos los registros tendrán archivo
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('desktops', function (Blueprint $table) {
            //
        });
    }
};
