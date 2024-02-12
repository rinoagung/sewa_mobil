<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    use HasFactory;

    protected $table = "pinjam";
    protected $guarded = ["id"];

    public function product()
    {
        return $this->belongsTo(Products::class, 'produk_id');
    }

    public function user()
    {
        return $this->belongsTo(Products::class, 'user_id');
    }
}
