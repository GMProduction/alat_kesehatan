<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $with = 'user.klinik';

    protected $fillable = [
        'user_id',
        'tanggal',
        'keterangan',
        'status',
    ];

    public function cart(){
        return $this->hasMany(Keranjang::class,'transaksi_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
