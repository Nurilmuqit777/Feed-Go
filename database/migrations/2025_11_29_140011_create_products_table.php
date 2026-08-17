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
            $table->foreignId('category_id')->constrained('product_categories')->cascadeOnDelete();
            $table->string('product_name');
            $table->text('product_description');
            $table->decimal('product_weight', 8, 2)->unsigned();
            $table->enum('product_unit', ['kg', 'gr']);
            $table->decimal('product_price', 10, 2)->unsigned();
            $table->decimal('product_discount_price', 10, 2)->unsigned()->nullable();
            $table->unsignedInteger('product_stock');
            $table->enum('product_status', ['available', 'unavailable'])->default('available');
            $table->string('product_image1');
            $table->string('product_image2')->nullable();
            $table->string('product_image3')->nullable();
            $table->string('product_image4')->nullable();
            $table->string('product_slug')->unique();
            $table->timestamps();
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
