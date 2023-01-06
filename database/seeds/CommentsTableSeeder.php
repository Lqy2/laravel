<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
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
                'uname' => '说好不哭',
                'cid' => '26',
                'cname' => '贵州岑巩：家庭医生进农村 守护健康暖人心',
                'content' => '想要对你说的不敢说的爱，会不会有人可以明白~',
            ]
        ];
        DB::table('comments')->insert($data);
    }
}
