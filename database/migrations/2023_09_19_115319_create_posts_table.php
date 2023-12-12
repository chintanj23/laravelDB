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
        Schema::create('posts', function (Blueprint $table) {
            $table->id()->startingValue(startingValue:1000);

            $table->foreignId('user_id')
            ->constrained('users')
            ->cascadeOnDelete();

            $table->string(column:'title')->unique();
            $table->string(column:'slug');
            $table->text(column:'excerpt')->comment(comment:'Summary of post');
            $table->longText(column:'description');
            $table->boolean(column:'is_published')->default(value:false);
            $table->integer(column:'min_to_read')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
