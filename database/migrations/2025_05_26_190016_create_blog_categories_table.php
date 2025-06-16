<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::table('blog_posts', function (Blueprint $table) {
            $table->foreignId('blog_category_id')
                  ->nullable()
                  ->constrained('blog_categories')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->dropForeign(['blog_category_id']);
            $table->dropColumn('blog_category_id');
        });
        
        Schema::dropIfExists('blog_categories');
    }
};