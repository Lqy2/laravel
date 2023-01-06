<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'id' => 1,
                'pid' => 0,
                'name' => '生活',
                'sort'=>1,
                'examine'=>'是'
            ],
            [
                'id' => 2,
                'pid' => 0,
                'name' => '商业',
                'sort'=>2,
                'examine'=>'是'
            ],
            [
                'id' => 3,
                'pid' => 0,
                'name' => '世界',
                'sort'=>3,
                'examine'=>'是'
            ],
            [
                'id' => 4,
                'pid' => 0,
                'name' => '体育',
                'sort'=>4,
                'examine'=>'是'
            ],
            [
                'id' => 5,
                'pid' => 0,
                'name' => '科技',
                'sort'=>5,
                'examine'=>'是'
            ],
            [
                'id' => 6,
                'pid' => 0,
                'name' => '新闻',
                'sort'=>6,
                'examine'=>'是'
            ],
            [
                'id' => 7,
                'pid' => 1,
                'name' => '健康',
                'sort'=>7,
                'examine'=>'是'
            ]
        ];
        DB::table('category')->insert($data);
    }
}
