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
        Schema::create('syairs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasaran_id')->nullable();
            $table->foreignId('user_id');
            $table->foreignId('sts_id')->nullable();
            $table->string('nm_pasar');
            $table->string('slug')->unique();
            $table->string('artaimage')->nullable();
            $table->string('arwanaimage')->nullable();
            $table->string('doyanimage')->nullable();
            $table->string('duoimage')->nullable();
            $table->string('jeepimage')->nullable();
            $table->string('neonimage')->nullable();
            $table->string('neroimage')->nullable();
            $table->string('romaimage')->nullable();
            $table->string('tokeimage')->nullable();
            $table->string('tsimage')->nullable();
            $table->string('zaraimage')->nullable();
            $table->date('datepost');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('syairs');
    }
};
