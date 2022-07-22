<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;

    protected $fillable = [
      'barang_id',
      'qty',
      'catatan',
      'tanggal_expired',
      'tanggal_masuk'
    ];

    public function barang(){
        return $this->belongsTo(Barang::class,'barang_id');
    }
}
