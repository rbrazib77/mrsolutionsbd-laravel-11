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
        Schema::create('page_section_titles', function (Blueprint $table) {
            $table->id();
             $table->string('page_name');        // উদাহরণ: home, about, contact
    $table->string('section_name');     // উদাহরণ: hero, services, team
    $table->string('title')->nullable(); // section title
    $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_section_titles');
    }
};
