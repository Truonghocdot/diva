<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('page_revisions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->string('slug');
            $table->text('summary')->nullable();
            $table->json('content')->nullable();
            $table->string('template')->default('default');
            $table->boolean('is_published')->default(false);
            $table->boolean('is_homepage')->default(false);
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('page_revisions');
    }
};
