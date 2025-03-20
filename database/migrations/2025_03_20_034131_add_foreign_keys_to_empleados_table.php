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
        Schema::table('empleados', function (Blueprint $table) {
            $table->foreign(['cargo_id'], 'empleado_cargo')->references(['id'])->on('cargos')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['departamento_id'], 'empleado_departamento')->references(['id'])->on('departamentos')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->dropForeign('empleado_cargo');
            $table->dropForeign('empleado_departamento');
        });
    }
};
