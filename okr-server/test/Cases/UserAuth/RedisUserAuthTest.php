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
namespace HyperfTest\Cases\UserAuth;

use App\Service\Dao\UserDao;
use App\Service\UserAuth\RedisUserAuth;
use HyperfTest\HttpTestCase;

/**
 * @internal
 * @coversNothing
 */
class RedisUserAuthTest extends HttpTestCase
{
    public function testUserAuthInit()
    {
        $userAuth = $this->container->get(RedisUserAuth::class);
        $model = $this->container->get(UserDao::class)->first(1);

        $userAuth->init($model);
        $this->assertSame(1, $userAuth->getId());
        $this->assertIsString($userAuth->getToken());
    }
}
