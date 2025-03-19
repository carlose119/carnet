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
        Schema::create('autoridades', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nombre', 100)->nullable();
            $table->string('cargo')->nullable();
            $table->string('firma')->nullable();
            $table->string('sello')->nullable();
            $table->boolean('activo')->nullable()->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autoridades');
    }
};
