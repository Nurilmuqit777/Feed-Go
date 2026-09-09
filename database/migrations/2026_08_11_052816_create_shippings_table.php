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
        Schema::create('shippings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_address_id')->constrained('order_addresses')->cascadeOnDelete();
            $table->string('courier');
            $table->string('service');
            $table->unsignedInteger('cost');
            $table->string('tracking_number')->nullable()->unique();
            $table->enum('status',['submitted', 'shipped', 'cancelled', 'finished'])->default('submitted');
            $table->string('estimate')->nullable();
            $table->timestamp('shipped_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shippings');
    }
};
