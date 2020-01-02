<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cate_id');
            $table->string('code');
            $table->string('name');
            $table->string('description');
            $table->string('image');
            $table->string('more_image');
            $table->decimal('price',18,0);
            $table->decimal('promotion_price',18,0);
            $table->integer('vat');
            $table->integer('quantity');
            $table->text('content');
            $table->string('meta_tag_title');
            $table->string('meta_tag_description');
            $table->string('meta_tag_keywords');
            $table->integer('show_on_home');
            $table->integer('status');
            $table->dateTime('top_hot');
            $table->integer('view_count');
            $table->string('tags');
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
        Schema::dropIfExists('tbl_product');
    }
}
