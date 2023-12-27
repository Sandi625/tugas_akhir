<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'trx_date',
        'sub_amount',
        'amount_total',
        'discount_amount',
        'created_by',
        'updated_by',
        'total_products',
        'customer_id',
        'description',
    ];
}
