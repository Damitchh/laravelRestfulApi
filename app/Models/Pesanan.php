<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanans';

    protected $fillable = ['no_ktp', 'nama'];

    public function keranjangs()
    {
        return $this->belongsTo('App\Models\Keranjang', 'keranjangs_id', 'id');
    }
}