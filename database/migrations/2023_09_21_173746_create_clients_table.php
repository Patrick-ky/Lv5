<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up(): void
    {Schema::create('clients', function (Blueprint $table) {
        $table->id();
        $table->string('firstname');
        $table->string('middlename');
        $table->string('lastname');
        $table->date('birthdate');
        $table->string('clients_number');
        $table->string('purok');
        $table->string('barangay');
        $table->string('street');
        $table->string('city');
        $table->string('province');
        $table->string('zipcode');

        
        
        $table->enum('gender', ['Male', 'Female']);
        $table->timestamps();
        });
          }

     public function down(): void
           {
          Schema::dropIfExists('clients');
    }
   };
