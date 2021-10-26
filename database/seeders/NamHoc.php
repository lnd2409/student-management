<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class NamHoc extends Seeder
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
                'hk_ten' => 'Học kỳ 1',
            ]
        ];
        for ($i=21; $i <= 80 ; $i++) {
            # code...
            DB::table('nam_hoc')->insert([
                'nh_ten' => '20'.$i
            ]);
        }

    }
}
