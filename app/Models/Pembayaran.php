<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{


    public function up()
{
    Schema::create('pembayarans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('pesanan_id')->constrained()->onDelete('cascade');
        $table->string('metode');
        $table->integer('jumlah');
        $table->string('bukti')->nullable(); // simpan file bukti transfer
        $table->string('status')->default('menunggu'); // status: menunggu, dikonfirmasi
        $table->timestamps();
    });
}

    use HasFactory;
    protected $fillable = [
        'user_id',
        'pesanan_id',
        'metode',
        'jumlah',
        'bukti',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }


}
