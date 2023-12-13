<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->string('isbn')->primary()->default(''); // デフォルト値を設定
            $table->string('name');
            $table->timestamp('publishedAt');
            $table->foreignId('authorId')->constrained('authors', 'authorId');
            $table->foreignId('publisherId')->constrained('publishers', 'publisherId');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
