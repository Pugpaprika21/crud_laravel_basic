<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('user_models', function (Blueprint $table): void {
            $table->id();
            $table->string('username');
            $table->string('password', 10)->unique(); 
            $table->string('phone');
            $table->string('email');
            $table->string('user_img');
            $table->string('user_role');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('user_models');
    }

    //user_models
};
