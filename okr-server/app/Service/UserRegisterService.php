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
namespace App\Service;

use App\Contract\CodeGeneratorInterface;
use App\Contract\CodeSenderInterface;
use Han\Utils\Service;
use Hyperf\Di\Annotation\Inject;

class UserRegisterService extends Service
{
    /**
     * @Inject
     */
    protected CodeSenderInterface $sender;

    /**
     * @Inject
     */
    protected CodeGeneratorInterface $generator;

    public function sendCode(string $name): bool
    {
        $code = $this->generator->generate($name);

        $this->sender->send($name, $code);

        return true;
    }
}
