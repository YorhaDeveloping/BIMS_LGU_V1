<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class building extends Model
{
    use HasFactory;

    // Define the table name if it's not "buildings" (Laravel auto-detects plural by default)
    protected $table = 'buildings';

    // Mass assignment fields
    protected $fillable = [
        'building_name',
        'building_structure',
        'building_type',
        'building_area',
        'lot_area',
        'building_location',
        'building_in_charge',
        'date_of_completion',
        'lati',
        'longti',
        'image',
    ];
}
