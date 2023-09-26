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
        $table->integer('Age');
        $table->string('Address');
        $table->string('clients_number');
        $table->enum('gender', ['Male', 'Female']);
        $table->timestamps();
        });
          }

     public function down(): void
           {
          Schema::dropIfExists('clients');
    }
   };
