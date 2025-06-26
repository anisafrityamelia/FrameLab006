<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_order',
        'room_id',
        'order_date',
        'order_times',
        'total_amount',
        'payment_status',
        'snap_token',
        'payment_proof',
        'customer_name',    // Tambahkan ini
        'customer_email'    // Tambahkan ini
    ];

    protected $casts = [
        'order_times' => 'array'
    ];

    public function room()
    {
        return $this->belongsTo(ProdukRoom::class, 'room_id');
    }

    /**
     * Relasi ke Review
     */
    public function review()
    {
        return $this->hasOne(Review::class, 'code_order', 'code_order');
    }
}