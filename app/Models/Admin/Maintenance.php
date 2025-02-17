<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Users\CompletionForm;

class Maintenance extends Model
{
    protected $fillable = ['u_id', 'buildings_name', 'building_location', 'maintenance_type', 'issue_description', 'priority', 'attachments', 'submitter_name', 'submitter_email', 'submitter_phone', 'submittion_date', 'status', 'request_status', 'last_renovation_date'];

    public function completionForms()
    {
        return $this->hasMany(CompletionForm::class, 'maint_id');
    }
}
