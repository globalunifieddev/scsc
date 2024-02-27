<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'guide_name'
      ];

    //Pagination
    public function paginate()
    {
      $permissions = Permission::where('name', '>', 4)->simplePaginate(4);
    }
}
