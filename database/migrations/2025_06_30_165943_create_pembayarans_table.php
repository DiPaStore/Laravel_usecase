<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
   Schema::create('pembayarans', function (Blueprint $table) {
    $table->id();
    $table->foreignId('pesanan_id')->constrained()->onDelete('cascade');
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->string('metode');
    $table->integer('jumlah');
    $table->string('status')->default('menunggu_verifikasi');
    $table->timestamps();
});

}


    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
