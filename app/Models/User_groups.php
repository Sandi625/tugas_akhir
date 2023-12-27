<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_groups extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_name',
        'created_by',
        'updated_by',
        'is_active',
        'description',
    ];
}
