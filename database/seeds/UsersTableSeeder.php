<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //UsersTableSeeder
        $data=[
            [
                'id'=>'1',
                'name'=>'离别没有结尾',
                'image'=>'e37f3e8770da7dedbecabe317950d84b.jpg',
                'email'=>'10086@qq.com',
                'password'=>'123456',
            ]
        ];
        DB::table('users')->insert($data);
    }
}
