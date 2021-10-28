<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;
class SinhVien extends Seeder
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
                'sv_ma'=>'SV001',
                'sv_ten'=>'Lê Văn A',
                'sv_namsinh'=>'1998',
                'sv_email'=>'sv001@gmail.com',
                'l_id'=>rand(1,3),
                'username'=>'SV001',
                'password'=>Hash::make('SV001'),
            ],
            [
                'sv_ma'=>'SV002',
                'sv_ten'=>'Lê Văn B',
                'sv_namsinh'=>'1998',
                'sv_email'=>'sv002@gmail.com',
                'l_id'=>rand(1,3),
                'username'=>'SV002',
                'password'=>Hash::make('SV002'),
            ],
            [
                'sv_ma'=>'SV003',
                'sv_ten'=>'Lê Văn C',
                'sv_namsinh'=>'1998',
                'sv_email'=>'sv003@gmail.com',
                'l_id'=>rand(1,3),
                'username'=>'SV003',
                'password'=>Hash::make('SV003'),
            ]
        ];
            
            
            DB::table('sinh_vien')->insert($data);

    }
}