<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContactInfoToProposalsTable extends Migration
{
    public function up()
    {
        Schema::table('proposals', function (Blueprint $table) {
            $table->string('contact_info')->nullable()->after('status'); // Adding contact_info column
        });
    }

    public function down()
    {
        Schema::table('proposals', function (Blueprint $table) {
            $table->dropColumn('contact_info');
        });
    }
}
