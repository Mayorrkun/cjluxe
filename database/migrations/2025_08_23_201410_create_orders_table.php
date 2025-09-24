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
                $table->foreignId('user_id')->constrained('users');
                $table->string('reference')->nullable();
                $table->string('recipient')->nullable();
                $table->enum('status',['pending','paid','completed','cancelled','failed'])->default('pending');
                $table->string('address');
                $table->integer('phone');
                $table->string('city');
                $table->string('state');
                $table->decimal('total',10, 2);
                $table->boolean('is_delivered')->default(false);
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
                $table->enum('size',['M','L','XL']);
                $table->decimal('price');
                $table->decimal('discount',10,2);
                $table->timestamps();


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
