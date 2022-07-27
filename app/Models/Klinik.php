<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klinik extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_klinik',
        'alamat',
        'no_hp'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
