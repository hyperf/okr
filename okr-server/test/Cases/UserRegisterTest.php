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

use Hyperf\Redis\Redis;
use HyperfTest\HttpTestCase;
use HyperfTest\Stubs\PHPMailerStub;
use PHPMailer\PHPMailer\PHPMailer;

/**
 * @internal
 * @coversNothing
 */
class UserRegisterTest extends HttpTestCase
{
    public function testUserSendCode()
    {
        $this->container->define(PHPMailer::class, PHPMailerStub::class);

        $res = $this->json('/user/send-code', [
            'name' => '715557344@qq.com',
        ]);

        $this->assertSame(0, $res['code']);

        $code = $this->container->get(Redis::class)->get('code:generator:715557344@qq.com');
        $this->assertNotEmpty($code);
    }
}
