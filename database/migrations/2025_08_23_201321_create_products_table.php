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
        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('product_name');
                $table->text('description')->nullable();
                $table->integer('quantity')->default(0);
                $table->decimal('price',10,2);
                $table->decimal('discount',10,2);
                $table->foreignId('category_id')
                    ->constrained('categories')
                    ->onDelete('cascade');
                $table->boolean('sold_out')->default(false);
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('product_images')){
            Schema::create('product_images', function (Blueprint $table) {
                $table->id();
                $table->foreignId('product_id')
                    ->constrained('products')->
                    onDelete('cascade');
                $table->string('img_src');
                $table->timestamps();
            });
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
