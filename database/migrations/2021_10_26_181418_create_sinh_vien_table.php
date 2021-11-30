<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinhVienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinh_vien', function (Blueprint $table) {
            $table->id('sv_id');
            $table->string('sv_ma');
            $table->string('sv_ten');
            $table->string('sv_namsinh');
            $table->string('sv_email');
            $table->string('username');
            $table->string('password');
            $table->bigInteger('l_id')->nullable()->unsigned();
            $table->foreign('l_id')->references('l_id')->on('lop');
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
        Schema::dropIfExists('sinh_vien');
    }
}
