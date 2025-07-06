<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Joki extends Model
{
 public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

public function joki()
{
    return $this->belongsTo(User::class, 'joki_id'); // jika joki_id digunakan
}
   //
}

