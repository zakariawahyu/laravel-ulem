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
        Schema::create('couples', function (Blueprint $table) {
            $table->id();
            $table->enum('couple_type', ['cpp', 'cpw']);
            $table->string('name');
            $table->string('parent_description');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('image');
            $table->string('image_caption');
            $table->string('instagram_url');
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('couples');
    }
};
