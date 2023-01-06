<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikesTableSeeder extends Seeder
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
                'id' => '1',
                'uid' => '1',
                'cid' => '13'
            ],
            [
                'id' => '2',
                'uid' => '1',
                'cid' => '13'
            ],
            [
                'id' => '3',
                'uid' => '1',
                'cid' => '11'
            ]
        ];
        DB::table('likes')->insert($data);
    }
}
