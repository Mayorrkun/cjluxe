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
        if(!Schema::hasTable('wish_lists')){

            Schema::create('wish_lists', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')
                    ->constrained('users')
                    ->onDelete('cascade');
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('wish_list_items')){
            Schema::create('wish_list_items', function (Blueprint $table) {
               $table->id();
               $table->foreignId('wish_list_id')
                   ->constrained('wish_lists')
                   ->onDelete('cascade');
               $table->foreignId('product_id')
                   ->constrained('products')
                   ->onDelete('cascade');

            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wish_lists');
    }
};
