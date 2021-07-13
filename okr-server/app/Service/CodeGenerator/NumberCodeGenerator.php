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
namespace App\Service\CodeGenerator;

use App\Contract\CodeGeneratorInterface;
use Hyperf\Di\Annotation\Inject;
use Hyperf\Redis\Redis;

class NumberCodeGenerator implements CodeGeneratorInterface
{
    /**
     * @Inject
     */
    protected Redis $redis;

    public function generate(string $name): string
    {
        $code = (string) rand(1000, 9999);

        $this->redis->set('code:generator:' . $name, $code);

        return $code;
    }

    public function verify(string $name, string $code): bool
    {
        $assert = $this->redis->get('code:generator:' . $name);

        return $assert === $code;
    }
}
