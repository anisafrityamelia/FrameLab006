<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_order',
        'room_id',
        'user_name',
        'user_email',
        'rating',
        'feedback'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'code_order', 'code_order');
    }

    public function room()
    {
        return $this->belongsTo(ProdukRoom::class, 'room_id');
    }
}