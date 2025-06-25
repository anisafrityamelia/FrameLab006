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
        'payment_proof'
    ];

    protected $casts = [
        'order_times' => 'array'
    ];

    public function room()
    {
        return $this->belongsTo(ProdukRoom::class, 'room_id');
    }
}