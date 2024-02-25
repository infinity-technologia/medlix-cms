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
        Schema::create('main_articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('app_id');
            $table->string('slug')->nullable();
            $table->string('title');
            $table->text('thumbnail');
            $table->longText('description')->nullable();
            $table->text('check')->nullable();
            $table->timestamps();

            $table->foreign('app_id')
                ->references('id')
                ->on('cms_apps')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_articles');
    }
};