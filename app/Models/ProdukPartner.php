<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukPartner extends Model
{
    use HasFactory;
    protected $table ='produk_partner';
    public $timestamps = false;
    protected $fillable = ['photo', 'photo1', 'photo2', 'photo3', 'room_name', 'description1', 'description2', 'description3', 'noTelepon', 'studio_type'];
}