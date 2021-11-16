<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;
class QuanTri extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quan_tri')->insert(
            [
                'qt_ten' => 'Lê Hoàng Bảo',
                'username' => 'admin',
                'password' => Hash::make('admin')
            ]
        );
    }
}
