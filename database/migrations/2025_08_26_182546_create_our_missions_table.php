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
        Schema::create('our_missions', function (Blueprint $table) {
            $table->id();
            $table->string('small_title')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('top_left_image')->nullable();
            $table->string('top_right_image')->nullable();
            $table->string('bottom_image')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_missions');
    }
};
