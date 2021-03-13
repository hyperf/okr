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
namespace App\Service\CodeSender;

use App\Contract\CodeSenderInterface;

class EmailCodeSender implements CodeSenderInterface
{
    public function send(string $name): string
    {
        return '1234';
    }

    public function verify(string $name, string $code): bool
    {
        return false;
    }
}
