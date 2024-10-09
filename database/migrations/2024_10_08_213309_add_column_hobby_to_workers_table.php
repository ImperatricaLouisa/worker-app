<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void //что происходит при запуске миграции
    {
        Schema::table('workers', function (Blueprint $table) {

            $table->string('hobby')->nullable();
            $table->foreignId('some_id')->index()->constrained('positions');
            $table->unique(['hobby','some_id']);
            $table->renameColumn('surname', 'second_name');
            $table->string('name',200)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void //что происходит при откате миграции
    {
        Schema::table('workers', function (Blueprint $table) {
            $table->string('name',200)->nullable(false)->change();
            $table->renameColumn('second_name', 'surname');
            $table->dropUnigue(['hobby','some_id']);
            $table->dropIndex(['some_id']);
            $table->dropForeign(['some_id']);
            $table->dropColumn('hobby');
        });
    }
};
