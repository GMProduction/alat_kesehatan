<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'foto',
        'qty'
    ];

    public function stok(){
        return $this->hasMany(Stok::class, 'barang_id');
    }
}
