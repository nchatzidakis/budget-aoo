<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('password')->nullable()->change();
            $table->string('google_id')->nullable()->index()->after('id');
            $table->string('google_token')->nullable()->after('google_id');
            $table->string('google_refresh_token')->nullable()->after('google_token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('password')->change();
            $table->dropColumn('google_id');
            $table->dropColumn('google_token');
            $table->dropColumn('google_refresh_token');
        });
    }
};
