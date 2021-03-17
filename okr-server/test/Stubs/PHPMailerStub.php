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
namespace HyperfTest\Stubs;

use Hyperf\Utils\Context;
use PHPMailer\PHPMailer\PHPMailer;

class PHPMailerStub extends PHPMailer
{
    public function send()
    {
        Context::set(PHPMailer::class, $this);
    }
}
