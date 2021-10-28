<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class Lop extends Seeder
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
                'l_ma' => 'Lập trình web',
            ],
            [
                'l_ma' => 'Lập trình mobile',
            ],
            [
                'l_ma' => 'Lập trình nhúng',
            ]
        ];

        DB::table('lop')->insert($data);
    }
}