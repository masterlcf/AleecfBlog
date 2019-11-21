<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Permission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('p_id');
            $table->string('name',30)->comment('菜单名称');
            $table->string('route',30)->default('')->comment('前端路由');
            $table->string('url',30)->default('')->comment('权限url');
            $table->string('icon',30)->default('')->comment('菜单图标');
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
        Schema::dropIfExists('permission');
    }
}
