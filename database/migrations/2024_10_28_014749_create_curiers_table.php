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
        Schema::create('curiers', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("address");
            $table->string("destination");
            $table->string("r_name");
            $table->string("r_email");
            $table->string("r_phone");
            $table->string("r_address");
            $table->string("order_id");
            $table->string("weight");
            $table->string("dimension");
            $table->string("package");
            $table->string("message");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curiers');
    }
};
