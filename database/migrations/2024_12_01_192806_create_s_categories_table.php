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
        Schema::create('s_categories', function (Blueprint $table) {
            $table->id();
            $table->string('SCategoryName', 100)->unique();
            $table->string('SCategoryImage', 250);
            $table->unsignedBigInteger('CategoryID');
            $table->foreign('CategoryID')
                ->references('id')
                ->on('categories')
                ->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_categories');
    }
};
