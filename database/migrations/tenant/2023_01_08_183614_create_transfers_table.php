<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('source_account_id')->nullable();
            $table->foreign('source_account_id')->references('id')->on('accounts');
            $table->unsignedBigInteger('destination_account_id')->nullable();
            $table->foreign('destination_account_id')->references('id')->on('accounts');
            $table->decimal('transactionAmount')->default(0);
            $table->string('notes')->nullable();
            $table->jsonb('meta')->nullable();
            $table->dateTime('transferred_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transfers');
    }
};
