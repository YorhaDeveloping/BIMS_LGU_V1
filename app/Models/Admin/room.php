<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    protected $fillable = [ 
        'room_id',
        'room_area',
        'room_capacity',
        'room_door', 
        'room_window', 
        'room_size', 
        'room_use',
        'room_remark',
    ];

}
