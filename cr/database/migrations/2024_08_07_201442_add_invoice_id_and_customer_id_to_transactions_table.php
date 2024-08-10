<?php

// database/migrations/xxxx_xx_xx_add_invoice_id_and_customer_id_to_transactions_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInvoiceIdAndCustomerIdToTransactionsTable extends Migration
{
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            // Check if 'invoice_id' column does not exist before adding it
            if (!Schema::hasColumn('transactions', 'invoice_id')) {
                $table->foreignId('invoice_id')->constrained()->onDelete('cascade');
            }

            // Check if 'customer_id' column does not exist before adding it
            if (!Schema::hasColumn('transactions', 'customer_id')) {
                $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            }
        });
    }

    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            // Check if 'invoice_id' column exists before dropping it
            if (Schema::hasColumn('transactions', 'invoice_id')) {
                $table->dropForeign(['invoice_id']);
                $table->dropColumn('invoice_id');
            }

            // Check if 'customer_id' column exists before dropping it
            if (Schema::hasColumn('transactions', 'customer_id')) {
                $table->dropForeign(['customer_id']);
                $table->dropColumn('customer_id');
            }
        });
    }
}
