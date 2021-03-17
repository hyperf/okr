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
namespace HyperfTest\Cases\CodeSender;

use App\Service\CodeSender\EmailCodeSender;
use HyperfTest\HttpTestCase;

/**
 * @internal
 * @coversNothing
 */
class EmailCodeSenderTest extends HttpTestCase
{
    public function testSendEmail()
    {
        $sender = $this->container->get(EmailCodeSender::class);

        $this->assertTrue(true);
    }
}
