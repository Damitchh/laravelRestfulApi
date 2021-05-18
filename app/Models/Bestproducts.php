<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bestproducts extends Model
{
    use HasFactory;
    
    protected $table = 'bestproducts';
    
    protected $fillable = ['kode' , 'nama' , 'harga' , 'gambar'];
    
}