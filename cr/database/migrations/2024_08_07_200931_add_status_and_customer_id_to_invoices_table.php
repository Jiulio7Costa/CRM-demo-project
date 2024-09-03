<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusAndCustomerIdToInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            // Check if foreign key exists before attempting to drop
            $existingForeignKeys = \DB::select("
                SELECT CONSTRAINT_NAME
                FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
                WHERE TABLE_NAME = 'invoices' AND CONSTRAINT_SCHEMA = DATABASE()
            ");
            
            foreach ($existingForeignKeys as $key) {
                if ($key->CONSTRAINT_NAME === 'invoices_customer_id_foreign') {
                    $table->dropForeign(['customer_id']);
                    break;
                }
            }

            // Add the new columns or modify existing columns
            $table->string('status')->default('pending');
            $table->unsignedBigInteger('customer_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            // Revert changes made in the `up` method
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');

            $table->dropColumn('status');
            $table->unsignedBigInteger('customer_id')->nullable(false)->change();
        });
    }
}
