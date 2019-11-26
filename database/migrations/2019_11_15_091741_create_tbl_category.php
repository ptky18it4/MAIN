<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_category', function (Blueprint $table) {
            $table->bigIncrements('category_id');
            $table->string('category_name');
            $table->string('category_description');
            $table->string('category_meta_tag_title');
            $table->string('category_meta_tag_description');
            $table->string('category_meta_tag_keywords');
            $table->integer('category_parent_id');
            $table->integer('category_display_order');
            $table->integer('category_status');
            $table->integer('category_sort_order');
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
        Schema::dropIfExists('tbl_category');
    }
}
