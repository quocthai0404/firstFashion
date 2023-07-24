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
                $table->string('product_src');
                $table->integer('quantity');
                $table->integer('price');
                $table->longText('description');
                $table->integer('gender');
                $table->unsignedBigInteger('brand_id');
                $table->foreign('brand_id')->references('id')->on('brands');
                $table->unsignedBigInteger('cat_id');
                $table->foreign('cat_id')->references('id')->on('categories');
                $table->timestamps();
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
