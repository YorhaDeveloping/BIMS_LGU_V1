<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Admin\Maintenance;

class CompletionForm extends Model
{
    protected $fillable = [
        'name',
        'maint_id',
        'requesting_office',
        'control_no',
        'date_requested',
        'service_requested',
        'location',
    ];

    public function maintenance()
    {
        return $this->belongsTo(Maintenance::class, 'maint_id');
    }
}
