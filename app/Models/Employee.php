<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'staff_id',
        'first_name',
        'last_name',
        'file_number',
        'dob',
        'gender',
        'state',
        'lga',
        'mda',
        'added_by',
        'last_update_by',
        'highest_qualification',
        'first_appointment_date',
        'current_rank',
        'last_promotion_date',
        'status',
        'status_changed_date'
            
    ];
    
    public function uploads() {
        return $this->hasMany(Upload::class);
    }
}
