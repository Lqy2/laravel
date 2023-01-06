<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_user', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('主键');
            $table->string('username',32)->comment('用户名')->unique();
            $table->char('image', 255)->nullable()->comment('头像');
            $table->string('email')->unique();
            $table->string('password',32)->comment('密码');
            $table->string('salt',32)->comment('密码salt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_user');
    }
}
