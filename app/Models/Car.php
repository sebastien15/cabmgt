<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';
 
    protected $fillable = ['name', 'description', 'image', 'seates', 'status','operator_id','custom_price_per_km','luggage_place'];

    use HasFactory;
}
