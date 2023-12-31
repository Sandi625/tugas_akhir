<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->unsignedBigInteger('category_id');
            $table->string('product_code');
            $table->enum('is_active', ['1', '0']);
            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->text('description');
            $table->decimal('price', 15, 2);
            $table->string('unit');
            $table->decimal('discount_amount', 15, 2);
            $table->integer('stock');
            $table->text('image')->nullable();

            $table->foreign('category_id')->references('id')->on('product_categories')->onDelete('restrict')->onUpdate('cascade');
        });




    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
