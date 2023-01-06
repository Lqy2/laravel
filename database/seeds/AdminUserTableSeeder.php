<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AdminUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $salt = md5(uniqid(microtime(), true));
        $password = md5(md5('123456') . $salt);
        $data = [
            [
                'id' => '1',
                'username' => 'admin',
                'image'=>'e37f3e8770da7dedbecabe317950d84b.jpg',
                'email'=>'1008611@qq.com',
                'password' => $password,
                'salt' => $salt,
            ],
            [
                'id' => '2',
                'username' => '说好不哭',
                'image'=>'ee85e4b004c4b7c37d836b6862ffcb4c.jpg',
                'email'=>'10086@qq.com',
                'password' => $password,
                'salt' => $salt,
            ]
        ];
        DB::table('admin_user')->insert($data);
    }
}
