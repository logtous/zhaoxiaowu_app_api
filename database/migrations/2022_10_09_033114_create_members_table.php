<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('username')->comment('账号');
            $table->string('password')->comment('密码');
            $table->string('phone')->comment('手机号');
            $table->string('name')->comment('姓名');
            $table->boolean('gender')->comment('性别');
            $table->date('birthday')->comment('生日');
            $table->tinyInteger('solar')->comment('阳历or阴历');
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
        Schema::dropIfExists('members');
    }
};
