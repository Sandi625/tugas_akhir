<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales_details extends Model
{
    use HasFactory;

    protected $fillable = [
        'sales_id',
        'product_id',
        'quantity',
        'created_by',
        'updated_by',
        'amount_total',
    ];
}
