<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonHocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mon_hoc', function (Blueprint $table) {
            $table->id('mh_id');
            $table->string('mh_ma');
            $table->string('mh_ten');
            $table->integer('mh_tinchi')->default(1)->unsigned();
            $table->bigInteger('gv_id')->nullable()->unsigned();
            $table->foreign('gv_id')->references('gv_id')->on('giao_vien');
            $table->bigInteger('hk_id')->nullable()->unsigned();
            $table->foreign('hk_id')->references('hk_id')->on('hoc_ky');
            $table->bigInteger('nh_id')->nullable()->unsigned();
            $table->foreign('nh_id')->references('nh_id')->on('nam_hoc');
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
        Schema::dropIfExists('mon_hoc');
    }
}
