<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('expenses', function (Blueprint $table) {
            $table->unsignedBigInteger('bill_id')->nullable()->after('account_id');
            $table->foreign('bill_id')->references('id')->on('bills');
        });
    }

    public function down()
    {
        Schema::table('expenses', function (Blueprint $table) {
            $table->dropIndex(['bill_id']);
            $table->dropColumn('bill_id');
        });
    }
};
