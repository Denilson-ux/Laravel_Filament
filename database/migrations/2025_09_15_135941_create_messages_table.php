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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id')->constrained('users'); // Profesor que envía el mensaje
            $table->string('type'); // 'aviso' o 'recordatorio'
            $table->string('title');
            $table->text('content');
            $table->string('grade')->nullable();
            $table->string('section')->nullable();
            $table->boolean('is_urgent')->default(false); // Para el campo 'Marcar como urgente'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
