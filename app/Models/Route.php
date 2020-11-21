<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $table = 'routes';

    protected $fillable = ['from', 'to', 'from_post_code', 'to_post_code', 'price','kilometers','time'];

    public function stations()
    {
        return $this->hasMany('App\Models\Station');
    }
    
    use HasFactory;
}
