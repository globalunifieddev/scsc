<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'incident_date',
        'description',
        'status_of_incident',
        'reported_by',
        'last_comment_by',
        'added_by'
    ];
}
