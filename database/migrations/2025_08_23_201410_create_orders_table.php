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
        if(!Schema::hasTable('orders')){
            Schema::create('orders', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained('user');
                $table->string('reference')->nullable();
                $table->enum('status',['pending','processing','completed','cancelled'])->default('pending');
                $table->string('address');
                $table->string('city');
                $table->string('state');
                $table->decimal('total',10, 2);
                $table->timestamps();
            });
        }
        if(!Schema::hasTable('order_items')){
            Schema::create('order_items', function (Blueprint $table) {
                $table->id();
                $table->foreignId('order_id')
                    ->constrained('orders')
                    ->onDelete('cascade');
                $table->foreignId('product_id')
                    ->constrained('products')
                    ->onDelete('cascade');
                $table->integer('quantity');
                $table->decimal('price');
                $table->decimal('discount',10,2);


            });
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
