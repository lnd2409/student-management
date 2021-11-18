<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXepLoaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xep_loai', function (Blueprint $table) {
            $table->id('xl_id');
            $table->string('xl_xeploai')->default('Chưa có');
            $table->bigInteger('sv_id')->nullable()->unsigned();
            $table->foreign('sv_id')->references('sv_id')->on('sinh_vien');
            $table->bigInteger('hk_id')->nullable()->unsigned();
            $table->foreign('hk_id')->references('hk_id')->on('hoc_ky');
            $table->bigInteger('nh_id')->nullable()->unsigned();
            $table->foreign('nh_id')->references('nh_id')->on('nam_hoc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('xep_loai');
    }
}
