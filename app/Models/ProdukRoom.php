<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukRoom extends Model
{
    use HasFactory;
    protected $table ='produk_studio';
    public $timestamps = false;
    protected $fillable = ['photo', 'room_name', 'description', 'duration', 'studio_type','price'];
} 