<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendors extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'phone_number',
        'email',
        'address',
        'created_by',
        'updated_by',
        'is_active',
    ];
}
