<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferApplication extends Model
{
    use HasFactory;
    protected $fillable = [
        'civil_servant_ID',
        'application_date',
        'from_MDA_ID',
        'to_MDA_ID',
        'status'
    ];
}
