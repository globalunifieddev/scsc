<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'application_date',
        'transfer_date',
        'from_MDA',
        'to_MDA',
        'approved_by',
        'applied_by',
        'present_appointment',
        'present_gl_salary',
        'education_qualification',
        'last_promotion',
        'self_apply',
        'gazette_or_notice',
        'comment',
        'status'
    ];
}
