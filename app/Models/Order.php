<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // ✅ tambahkan ini
        'code_order',
        'room_id',
        'order_date',
        'order_times',
        'total_amount',
        'payment_status',
        'snap_token',
        'payment_proof',
        'customer_name',
        'customer_email'
    ];

    protected $casts = [
        'order_times' => 'array'
    ];

    public function room()
    {
        return $this->belongsTo(ProdukRoom::class, 'room_id');
    }

    public function user() // ✅ relasi ke user
    {
        return $this->belongsTo(\App\Models\Users::class, 'user_id');
    }

    public function review()
    {
        return $this->hasOne(Review::class, 'code_order', 'code_order');
    }

    public function getStudioTypeAttribute()
    {
        return $this->room ? $this->room->studio_type : 'N/A';
    }

    public function getPaymentStatusBadgeAttribute()
    {
        switch ($this->payment_status) {
            case 'paid':
                return '<span class="bg-green-500 text-white px-2 py-1 rounded-full text-xs">Paid</span>';
            case 'pending':
                return '<span class="bg-yellow-500 text-white px-2 py-1 rounded-full text-xs">Pending</span>';
            case 'failed':
                return '<span class="bg-red-500 text-white px-2 py-1 rounded-full text-xs">Failed</span>';
            default:
                return '<span class="bg-gray-500 text-white px-2 py-1 rounded-full text-xs">Unknown</span>';
        }
    }
}
