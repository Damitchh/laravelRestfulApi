<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    protected $table = 'keranjangs';
    protected $fillable = ['jumlah_pemesanan'];
    
    public function products()
    
{
      return $this->belongsTo('App\Models\Products','products_id', 'id');
}

    
}