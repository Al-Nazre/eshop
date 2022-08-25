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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->Integer('cate_id')->default(0);
            $table->string('name');
            $table->string('slug');
            $table->mediumText('small_descrip');
            $table->longText('description');
            $table->string('original_price');
            $table->string('selling_price');
            $table->string('image');
            $table->string('qty');
            $table->string('tax');
            $table->tinyInteger('status');
            $table->tinyInteger('trending');
            $table->mediumText('meta_title');
            $table->mediumText('meta_keywords');
            $table->mediumText('meta_descrip');         
            $table->timestamps();
        });
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
