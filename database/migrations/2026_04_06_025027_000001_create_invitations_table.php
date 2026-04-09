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
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('theme_id')->constrained();
            $table->string('slug')->unique(); // yusril&fitri
            
            // Bride & Groom
            $table->string('bride_name');
            $table->string('bride_nickname')->nullable();
            $table->string('groom_name');
            $table->string('groom_nickname')->nullable();
            
            // Event Details
            $table->dateTime('wedding_date');
            $table->string('location_name')->nullable();
            $table->text('location_address')->nullable();
            $table->text('location_maps_embed')->nullable();
            
            // Content
            $table->json('love_story')->nullable(); // [{"title": "...", "date": "...", "content": "..."}]
            $table->string('music_url')->nullable();
            
            // Settings
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitations');
    }
};
