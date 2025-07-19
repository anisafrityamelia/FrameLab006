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


    /**
     * Relasi ke Review
     */
    public function reviews()
    {
        return $this->hasMany(Review::class, 'room_id');
    }

    /**
     * Get average rating
     */
    public function getAverageRatingAttribute()
    {
        return $this->reviews()->avg('rating') ?? 0;
    }

    /**
     * Get total reviews count
     */
    public function getTotalReviewsAttribute()
    {
        return $this->reviews()->count();
    }
} 