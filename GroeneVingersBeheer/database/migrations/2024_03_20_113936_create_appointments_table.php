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
        Schema::create('type', function (Blueprint $table) {
            $table->id(); // This will create a column named 'id' as primary key
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->datetime('start_time');
            $table->datetime('finish_time');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->longText('comments')->nullable();
            // Specify 'id' as the referenced column in the 'type' table
            $table->foreignId('type_id')->constrained('type');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
        Schema::dropIfExists('type');
    }
};
