<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixInvoicesForeignKeysAndColumns extends Migration
{
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
         
            $table->string('new_column')->nullable(); // Example of adding a new column
        });
    }

    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn('new_column');
        });
    }
}
