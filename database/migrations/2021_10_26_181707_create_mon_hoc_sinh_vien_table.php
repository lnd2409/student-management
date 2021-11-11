<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonHocSinhVienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mon_hoc_sinh_vien', function (Blueprint $table) {
            $table->id();
            $table->integer('mhsv_diem_1')->default(0);
            $table->integer('mhsv_diem_2')->default(0);
            $table->integer('mhsv_diem_phuc_khao_1')->default(0);
            $table->integer('mhsv_diem_phuc_khao_2')->default(0);
            $table->integer('mhsv_diemtong')->default(0);
            $table->string('mhsv_diemchu',2)->default('F');
            $table->bigInteger('sv_id')->nullable()->unsigned();
            $table->foreign('sv_id')->references('sv_id')->on('sinh_vien');
            $table->bigInteger('pk_id')->nullable()->unsigned();
            $table->foreign('pk_id')->references('pk_id')->on('phuc_khao');
            $table->bigInteger('mh_id')->nullable()->unsigned();
            $table->foreign('mh_id')->references('mh_id')->on('mon_hoc');
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
        Schema::dropIfExists('mon_hoc_sinh_vien');
    }
}