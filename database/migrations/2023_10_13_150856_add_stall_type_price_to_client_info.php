<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStallTypePriceToClientInfo extends Migration
{
    public function up()
    {
        Schema::table('client_info', function (Blueprint $table) {
            $table->decimal('stall_type_price', 10, 2)->nullable();
        });
    }

    public function down()
    {
        Schema::table('client_info', function (Blueprint $table) {
            $table->dropColumn('stall_type_price');
        });
    }
}

