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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('SCategoryID');
            $table->string('ProductName');
            $table->text('Description')->nullable();
            $table->decimal('Price', 8, 2);
            $table->integer('Stock')->default(0);
            $table->timestamps();

            $table->foreign('SCategoryID')
                ->references('id')
                ->on('s_categories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
