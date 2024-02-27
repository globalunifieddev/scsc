<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisciplinaryIncident extends Model
{
    use HasFactory;
    protected $fillable = [
        'civil_servant_ID',
        'incident_date',
        'description',
        'status_of_incident',
        'awaiting_remark_from'
    ];
}
