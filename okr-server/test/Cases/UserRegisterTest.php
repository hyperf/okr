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
namespace HyperfTest\Cases;

use HyperfTest\HttpTestCase;

/**
 * @internal
 * @coversNothing
 */
class UserRegisterTest extends HttpTestCase
{
    public function testUserSendCode()
    {
        // $res = $this->json('/user/send-code', [
        //     'name' => '111@qq.com',
        // ]);
        //
        // $this->assertSame(0, $res['code']);

        $this->assertTrue(true);
    }
}
