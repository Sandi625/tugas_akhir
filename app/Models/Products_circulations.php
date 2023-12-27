<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products_circulations extends Model
{
    use HasFactory;

    protected $fillable = [
        'trx_date',
        'reff',
        'in',
        'out',
        'product_id',
        'remaining_stock',
        'created_by',
        'updated_by',

    ];
}
