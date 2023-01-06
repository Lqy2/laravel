<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('主键');
            $table->integer('pid')->comment('父栏目id') ->default('0');
            $table->string('name', 32)->comment('栏目名称');
            $table->integer('sort')->comment('排序值') ->default('0');
            $table->string('examine')->comment('是否审核') ->default('是');
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
        Schema::dropIfExists('category');
    }
}
