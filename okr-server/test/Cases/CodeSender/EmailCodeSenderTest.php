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
use Hyperf\Utils\Context;
use HyperfTest\HttpTestCase;
use HyperfTest\Stubs\PHPMailerStub;
use PHPMailer\PHPMailer\PHPMailer;

/**
 * @internal
 * @coversNothing
 */
class EmailCodeSenderTest extends HttpTestCase
{
    public function testSendEmail()
    {
        $this->container->define(PHPMailer::class, PHPMailerStub::class);

        $sender = $this->container->get(EmailCodeSender::class);

        $sender->send('10001@qq.com', '1234');

        $mailer = Context::get(PHPMailer::class);

        $this->assertSame('10001@qq.com', $mailer->getToAddresses()[0][0]);
    }
}
