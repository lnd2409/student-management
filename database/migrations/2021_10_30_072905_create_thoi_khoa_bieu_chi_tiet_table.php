<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThoiKhoaBieuChiTietTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thoi_khoa_bieu_chi_tiet', function (Blueprint $table) {
            $table->date('tkbct_ngay');
            $table->integer('tkbct_tiet');
            $table->bigInteger('mh_id')->nullable()->unsigned();
            $table->foreign('mh_id')->references('mh_id')->on('mon_hoc');
            $table->bigInteger('tkb_id')->nullable()->unsigned();
            $table->foreign('tkb_id')->references('tkb_id')->on('thoi_khoa_bieu');
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
        Schema::dropIfExists('thoi_khoa_bieu_chi_tiet');
    }
}
