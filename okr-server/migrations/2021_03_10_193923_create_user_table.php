<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
use Hyperf\Database\Migrations\Migration;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Schema\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email', 128)->unique()->nullable()->comment('登录邮箱');
            $table->string('username', 128)->unique()->nullable()->comment('第三方唯一凭证');
            $table->string('nickname', 128)->comment('昵称')->default('');
            $table->string('password', 128)->comment('密码')->default('');
            $table->tinyInteger('gender')->default(0)->comment('0未填 1男 2女');
            $table->dateTime('created_at')->default('2021-01-01');
            $table->dateTime('updated_at')->default('2021-01-01');
            $table->comment('用户表');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
}
