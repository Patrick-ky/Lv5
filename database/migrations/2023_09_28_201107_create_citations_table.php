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
        Schema::create('citations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('stalltype_id');
            $table->unsignedBigInteger('violation_id');           
            $table->unsignedBigInteger('stall_number_id')->unique();
            $table->date('start_date'); 
            $table->integer('totalpenalty');


            $table->foreign('violation_id')->references('id')->on('violations');
            $table->foreign('client_id')->references('id')->on('clients');            
            $table->foreign('stalltype_id')->references('id')->on('stall_types');
            $table->foreign('stall_number_id')->references('id')->on('stall_numbers');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citations');
    }
};
