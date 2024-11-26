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
        Schema::create('couriers', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('status'); // to store the status of the courier
            $table->string('sender_id');
            $table->string('receiver_name');
            $table->string('receiver_email');
            $table->string('receiver_phone');
            $table->string('sender_address');
            $table->string('receiver_address');
            $table->string('destination');
            $table->float('weight');
            $table->string('dimensions');
            $table->string('package_type');
            $table->string('special_instructions')->nullable();
            $table->date('expected_delivery_date');
            $table->date('date_shipped');
            $table->timestamps();
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('couriers');
    }
};
