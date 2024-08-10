<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusAndCustomerIdToInvoicesTable extends Migration
{
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            // Check if 'status' column does not exist before adding it
            if (!Schema::hasColumn('invoices', 'status')) {
                $table->string('status')->default('pending');
            }

            // Check if 'customer_id' column does not exist before adding it
            if (!Schema::hasColumn('invoices', 'customer_id')) {
                $table->foreignId('customer_id')->nullable()->constrained()->onDelete('cascade');
            }
        });
    }

    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            // Check if 'status' column exists before dropping it
            if (Schema::hasColumn('invoices', 'status')) {
                $table->dropColumn('status');
            }

            // Check if 'customer_id' column exists before dropping it
            if (Schema::hasColumn('invoices', 'customer_id')) {
                $table->dropForeign(['customer_id']);
                $table->dropColumn('customer_id');
            }
        });
    }
}
