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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transfer_id')->nullable();
            $table->foreign('transfer_id')->references('id')->on('transfers');
            $table->unsignedBigInteger('expense_id')->nullable();
            $table->foreign('expense_id')->references('id')->on('expenses');
            $table->unsignedBigInteger('account_id')->nullable();
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->string('transactionId');
            $table->decimal('transactionAmount')->default(0);
            $table->string('notes')->nullable();
            $table->jsonb('meta')->nullable();
            $table->dateTime('paid_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
