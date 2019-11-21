<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30)->default('')->comment('用户名');
            $table->string('email',50)->comment('email');
            $table->string('password')->comment('密码');
            $table->bigInteger('ip')->comment('登录ip');
            $table->string('api_token',30)->comment('验证token');
            $table->timestamp('login_time')->nullable(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
