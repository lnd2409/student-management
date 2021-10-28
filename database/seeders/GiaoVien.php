<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;
class GiaoVien extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'gv_ten'=>'Giáo viên A',
                'gv_email'=>'gva@gmail.com',
                'gv_sdt'=>'0123456789',
                'username'=>'GVA',
                'password'=>Hash::make('GVA'),
            ],
            [
                'gv_ten'=>'Giáo viên B',
                'gv_email'=>'gvb@gmail.com',
                'gv_sdt'=>'0123456789',
                'username'=>'GVB',
                'password'=>Hash::make('GVB'),
            ],
            [
                'gv_ten'=>'Giáo viên C',
                'gv_email'=>'gvb@gmail.com',
                'gv_sdt'=>'0123456789',
                'username'=>'GVC',
                'password'=>Hash::make('GVC'),
            ]
        ];
            
            
            DB::table('giao_vien')->insert($data);

    }
}