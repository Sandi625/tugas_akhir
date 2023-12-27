<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;


    // protected $guarded = [];
    protected $fillable = [
        'product_name',
        'category_id',
        'product_code',
        'is_active',
        'created_by',
        'updated_by',
        'description',
        'price',
        'unit',
        'discount_amount',
        'stock',
        'image',
    ];

    public function product_categories(){
        return $this->belongsTo(Product_categories::class, 'category_id');
    }
}
