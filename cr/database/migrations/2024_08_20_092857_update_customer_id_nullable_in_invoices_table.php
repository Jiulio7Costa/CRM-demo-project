<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            // Drop the existing foreign key constraint
            $table->dropForeign(['customer_id']);

            // Make customer_id column nullable
            $table->unsignedBigInteger('customer_id')->nullable()->change();

            // Add the new foreign key constraint with ON DELETE SET NULL
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            // Drop the new foreign key constraint
            $table->dropForeign(['customer_id']);

            // Revert customer_id column to not nullable
            $table->unsignedBigInteger('customer_id')->nullable(false)->change();

            // Add the original foreign key constraint
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }
};
