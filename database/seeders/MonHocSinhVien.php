<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class MonHocSinhVien extends Seeder
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
                'sv_id'=>1,
                'mh_id'=>1
            ],
            [
                'sv_id'=>2,
                'mh_id'=>1
            ],
            [
                'sv_id'=>3,
                'mh_id'=>1
            ],
            [
                'sv_id'=>1,
                'mh_id'=>2
            ],
            [
                'sv_id'=>2,
                'mh_id'=>2
            ],
            [
                'sv_id'=>3,
                'mh_id'=>2
            ],
        ];

        DB::table('mon_hoc_sinh_vien')->insert($data);
    }
}