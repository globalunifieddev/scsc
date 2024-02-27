<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'promotion_date',
        'previous_rank',
        'new_rank',
        'reason',
        'approved_by',
        'added_by',
        'status',
        'comment'
    ];
}
