<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    
    protected $fillable = [
        'user_id', 'route_id', 'car_id','seat_no','payed','approved',
        'nbr_people','nbr_luggage','one_way','return','pickup_date',
        'pickup_time','custom_message','pickup_full_add','dropoff_full_add'
    ];

    use HasFactory;
}
