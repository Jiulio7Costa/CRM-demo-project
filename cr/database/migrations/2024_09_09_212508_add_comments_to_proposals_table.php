<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCommentsToProposalsTable extends Migration
{
    public function up()
    {
        Schema::table('proposals', function (Blueprint $table) {
            $table->text('comments')->nullable()->after('contact_info'); // Adding comments column
        });
    }

    public function down()
    {
        Schema::table('proposals', function (Blueprint $table) {
            $table->dropColumn('comments');
        });
    }
}
