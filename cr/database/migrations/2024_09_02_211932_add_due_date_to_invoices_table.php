<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDueDateToInvoicesTable extends Migration
{
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            // Add the due_date column allowing NULL initially
            $table->date('due_date')->nullable()->after('amount');
        });
    }

    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            // Drop the due_date column
            $table->dropColumn('due_date');
        });
    }
}
