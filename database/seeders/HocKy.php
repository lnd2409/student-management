<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class HocKy extends Seeder
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
            ],
            [
                'hk_ten' => 'Học kỳ 2',
            ],
            [
                'hk_ten' => 'Học kỳ hè',
            ]
        ];

        DB::table('hoc_ky')->insert($data);
    }
}
