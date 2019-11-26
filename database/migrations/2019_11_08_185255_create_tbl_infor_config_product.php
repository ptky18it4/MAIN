<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblInforConfigProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_infor_config_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_infor_config_product');
            $table->string('CPU_technology');
            $table->string('CPU_types');
            $table->string('CPU_speed');
            $table->string('CPU_caching');
            $table->string('Maximum_speed_Turbo');
            $table->string('RAM_memory');
            $table->string('RAM_types');
            $table->string('Speed​_Bus');
            $table->string('Hard_Drive');
            $table->string('Screen_Size');
            $table->string('Resolution_W_x_H');
            $table->string('Technology_MH');
            $table->string('Touch_screen');
            $table->string('Graphics_card');
            $table->string('Graphics_memory');
            $table->string('Card_design');
            $table->string('Technology_Audio');
            $table->string('Information_Pin');
            $table->string('Time_used_often');
            $table->string('Charger');
            $table->string('Operating_system');
            $table->string('Size');
            $table->string('Weight');
            $table->string('Gateway',500);
            $table->string('Resolution_ưebcam');
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
        Schema::dropIfExists('tbl_infor_config_product');
    }
}
