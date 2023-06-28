<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'hotel_id',
        'room_type_id',
        'amount',
    ];

    /* One-to-Many relationship */
    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }

    /* Many-to-One relationship */
    public function roomType()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }
}
