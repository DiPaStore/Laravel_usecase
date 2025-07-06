<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'joki_id',
        'status',
        'harga',
        'detail',
        'konfirmasi_selesai',
    ];

    // 🔗 Relasi ke Customer (User yang memesan)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // 🔗 Relasi ke Joki (User yang ditugaskan)
    public function joki()
    {
        return $this->belongsTo(User::class, 'joki_id');
    }

    // 💳 Relasi ke Pembayaran
    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
}
