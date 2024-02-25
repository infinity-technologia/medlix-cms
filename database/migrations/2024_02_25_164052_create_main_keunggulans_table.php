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
        Schema::create('main_keunggulans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('app_id');
            $table->text('title')->nullable();
            $table->string('description')->nullable();
            $table->string('image_title')->nullable();
            $table->text('image')->nullable();
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
        Schema::dropIfExists('main_keunggulans');
    }
};
