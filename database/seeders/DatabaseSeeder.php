<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(HocKy::class);
        $this->call(NamHoc::class);
        $this->call(Lop::class);
        $this->call(SinhVien::class);
        $this->call(GiaoVien::class);
    }
}