<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        // 栏目
        $this->call(CategoryTableSeeder::class);
        // 管理员
        $this->call(AdminUserTableSeeder::class);
        // 内容
        $this->call(ContentTableSeeder::class);
        // 评论
        $this->call(CommentsTableSeeder::class);
        // 点赞
        $this->call(LikesTableSeeder::class);
    }
}
