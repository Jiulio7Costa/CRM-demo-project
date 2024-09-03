<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixInvoicesForeignKeysAndColumns extends Migration
{
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            // Example of how to modify a column or add a foreign key
            // Make sure to replace with actual changes you need
            $table->string('new_column')->nullable(); // Example of adding a new column
            // $table->foreign('customer_id')->references('id')->on('customers'); // Example of adding a foreign key
        });
    }

    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            // Example rollback
            $table->dropColumn('new_column');
            // $table->dropForeign(['customer_id']);
        });
    }
}
