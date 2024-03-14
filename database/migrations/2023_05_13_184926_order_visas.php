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
      

        Schema::create('order_visas', function (Blueprint $table) { 
            $table->id();  
            $table->string('email'); 
            $table->double('price');  
            $table->string('transaction');  
            $table->string('status'); 
            $table->string('card_number');  
            $table->string('exp_month');  
            $table->string('exp_year');  
            $table->string('cvc');   
            $table->timestamps(); 
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_visas'); 
    }
};
