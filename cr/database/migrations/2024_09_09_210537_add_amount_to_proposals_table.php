<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAmountToProposalsTable extends Migration
{
    public function up()
    {
        Schema::table('proposals', function (Blueprint $table) {
            $table->decimal('amount', 10, 2)->after('description'); // Adjust the data type and precision as needed
        });
    }

    public function down()
    {
        Schema::table('proposals', function (Blueprint $table) {
            $table->dropColumn('amount');
        });
    }
}
