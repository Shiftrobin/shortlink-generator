<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('vendor_id')->comment('vendor_id=user_id')->nullable();
                $table->integer('category_id')->nullable();
                $table->integer('sub_category_id')->nullable();
                $table->integer('unit_id')->nullable();
                $table->string('name')->unique();
                $table->string('slug')->nullable();
                $table->double('old_collective_price')->nullable();
                $table->double('current_collective_price')->nullable();
                $table->double('old_delivery_price')->nullable();
                $table->double('current_delivery_price')->nullable();
                $table->string('product_status')->nullable();
                $table->double('quantity')->nullable();
                $table->double('discount')->nullable();
                $table->double('vat')->nullable();
                $table->string('image')->nullable();
                $table->string('occation_remeaning')->nullable();
                $table->longText('occation_description')->nullable();
                $table->longText('ingredient')->nullable();
                $table->longText('nutrition_value')->nullable();
                $table->longText('allergy_advice')->nullable();
                $table->string('delivery_time')->nullable();
                $table->tinyInteger('status')->default(1);
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
