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
            $table->string('trx_id')->unique(); // Referensi unik transaksi
            $table->integer('user_id');// Relasi ke tabel users
            $table->enum('status', ['pending', 'berhasil', 'expired'])->default('pending');
            $table->decimal('amount', 10, 0);
            $table->timestamps(); // Kolom created_at dan updated_at

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
