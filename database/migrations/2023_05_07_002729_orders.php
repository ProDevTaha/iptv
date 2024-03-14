<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) { 
            $table->id();  
            $table->string('email'); 
            $table->double('price');  
            $table->string('payer_id');  
            $table->string('payment_id'); 
            $table->string('payment_status');  
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');  
    } 
};
