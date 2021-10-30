<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class MonHoc extends Seeder
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
                'mh_ma' => 'CT458',
                'mh_ten' => 'Lập trình web',
            ],
            [
                'mh_ma' => 'CT460',
                'mh_ten' => 'Lập trình mobile',
            ],
            [
                'mh_ma' => 'CT408',
                'mh_ten' => 'Lập trình nhúng',
            ]
        ];

        DB::table('mon_hoc')->insert($data);
    }
}
