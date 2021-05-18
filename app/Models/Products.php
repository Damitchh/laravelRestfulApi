<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['kode', 'nama', 'harga', 'gambar'];

    public function keranjangs()
    {
        return $this->belongsTo('App\Models\Keranjang', 'products_id', 'id');
    }
}