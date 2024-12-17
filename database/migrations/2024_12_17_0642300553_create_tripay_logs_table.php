<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripayLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pwp_tripay', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('trx_id')->nullable();
            $table->integer('user_id');
            $table->integer('amount');
            $table->decimal('money', 10, 0);
            $table->enum('status', ['PENDING', 'PAID', 'EXPIRED', 'FAILED'])->default('PENDING');
            $table->enum('status_code', ['0', '1', '2'])->default(0);
            $table->string('reference_id')->nullable();
            $table->string('promo_code')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('ID')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tripay_logs');
    }
}
