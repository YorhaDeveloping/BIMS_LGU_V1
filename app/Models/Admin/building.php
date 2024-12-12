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
        'building_cost',
        'lot_area',
        'building_location',
        'barangay',
        'building_in_charge',
        'date_of_completion',
        'date_constructed',
        'lati',
        'longti',
        'image',
        'is_archived',
    ];
}
