<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('streamer_id')->references('ID')->on('users')->onDelete('cascade'); // Changed to unsignedBigInteger
            $table->unsignedBigInteger('bankaccount_id')->references('id')->on('bank_accounts')->onDelete('cascade');
            $table->decimal('amount', 10, 0);
            $table->dateTime('date');
            $table->string('withdrawal_method');
            $table->string('transaction_id')->nullable();
            $table->string('status');
            $table->text('comments')->nullable();
            $table->unsignedBigInteger('processed_by')->nullable()->references('ID')->on('users')->onDelete('set null'); // Changed to unsignedBigInteger
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
        Schema::dropIfExists('withdrawals');
    }
}
