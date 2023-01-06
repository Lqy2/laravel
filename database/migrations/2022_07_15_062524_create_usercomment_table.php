<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsercommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usercomment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username',32);
            $table->string('title',32)->comment('文章标题');
            $table->string('content',36)->comment('文章内容');
            $table->integer('status')->comment('状态')->default('1');
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
        Schema::dropIfExists('usercomment');
    }
}
