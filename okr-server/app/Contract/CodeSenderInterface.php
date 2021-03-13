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
namespace App\Contract;

interface CodeSenderInterface
{
    /**
     * 发送注册验证码
     * @param string $name 手机号|邮箱|等等
     * @return string 验证码
     */
    public function send(string $name): string;

    /**
     * 验证 验证码 是否匹配.
     * @param string $name 手机号|邮箱|等等
     * @param string $code 验证码
     */
    public function verify(string $name, string $code): bool;
}
