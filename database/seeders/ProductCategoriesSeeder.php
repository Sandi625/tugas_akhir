<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductCategoriesSeeder extends Seeder
{
    public function run()
    {
        DB::table('product_categories')->insert([
            [
                'category_name' => 'Sport',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => '1',
                'updated_by' => '1',
                'is_active' => true,
            ],
            [
                'category_name' => 'Daily',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => '1',
                'updated_by' => '1',
                'is_active' => true,
            ],
            [
                'category_name' => 'Accessoris',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => '1',
                'updated_by' => '1',
                'is_active' => true,
            ],

        ]);
    }
}
