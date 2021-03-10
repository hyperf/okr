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
namespace App\Service\UserAuth;

use App\Constants\ErrorCode;
use App\Contract\UserAuthInterface;
use App\Exception\BusinessException;
use App\Model\User;
use Han\Utils\Service;
use Hyperf\Redis\Redis;
use Hyperf\Utils\Context;
use Psr\Container\ContainerInterface;

class RedisUserAuth extends Service implements UserAuthInterface
{
    /**
     * @var Redis
     */
    protected $redis;

    /**
     * @var string
     */
    protected $prefix = 'auth:';

    /**
     * @var int
     */
    protected $ttl = 86400;

    public function __construct(ContainerInterface $container)
    {
        $this->redis = $container->get(Redis::class);
        parent::__construct($container);
    }

    public function init(User $user)
    {
        $token = md5($user->id . uniqid());

        $serialized = serialize([
            'id' => $user->id,
        ]);

        $this->redis->set($this->formatToken($token), $serialized, $this->ttl);

        Context::set(UserAuthInterface::class . '::data', [
            'id' => (int) $user->id,
            'token' => $token,
        ]);

        return $this;
    }

    public function reload(string $token)
    {
        $serialized = $this->redis->get($this->formatToken($token));

        if (empty($serialized)) {
            throw new BusinessException(ErrorCode::TOKEN_INVALID);
        }

        $data = unserialize($serialized);
        if (empty($data['id'])) {
            throw new BusinessException(ErrorCode::TOKEN_INVALID);
        }

        Context::set(UserAuthInterface::class . '::data', [
            'id' => (int) $data['id'],
            'token' => $token,
        ]);
    }

    public function getId(): int
    {
        $data = Context::get(UserAuthInterface::class . '::data');
        if (is_array($data) && $id = $data['id']) {
            return $id;
        }

        throw new BusinessException(ErrorCode::TOKEN_INVALID);
    }

    public function getToken(): string
    {
        $data = Context::get(UserAuthInterface::class . '::data');
        if (is_array($data) && $token = $data['token']) {
            return $token;
        }

        throw new BusinessException(ErrorCode::TOKEN_INVALID);
    }

    protected function formatToken(string $token): string
    {
        return $this->prefix . $token;
    }
}
