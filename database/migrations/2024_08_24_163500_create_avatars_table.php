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
        Schema::create('avatars', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->timestamps();

            $table->unsignedBigInteger('avatarable_id');//сохраняется id работника или клиента из их таблиц
            $table->string('avatarable_type');//указывается модель с помощью которой определяется работник это или клиент
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avatars');
    }
};
