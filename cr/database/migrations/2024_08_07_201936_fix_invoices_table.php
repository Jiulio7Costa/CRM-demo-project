<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixInvoicesTable extends Migration
{
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            // Check if the column exists before adding it
            if (!Schema::hasColumn('invoices', 'status')) {
                $table->string('status')->default('pending');
            }
            if (!Schema::hasColumn('invoices', 'customer_id')) {
                $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            }
        });
    }

    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            if (Schema::hasColumn('invoices', 'status')) {
                $table->dropColumn('status');
            }
            if (Schema::hasColumn('invoices', 'customer_id')) {
                $table->dropForeign(['customer_id']);
                $table->dropColumn('customer_id');
            }
        });
    }
}

