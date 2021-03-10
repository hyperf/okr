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
namespace App\Contract;

use App\Exception\BusinessException;
use App\Model\User;

interface UserAuthInterface
{
    /**
     * 根据用户模型初始化用户权限.
     * @throws BusinessException
     * @return $this
     */
    public function init(User $user);

    /**
     * 根据 TOKEN 初始化用户权限.
     * @throws BusinessException
     * @return mixed
     */
    public function reload(string $token);

    /**
     * 读取用户ID.
     * @throws BusinessException
     */
    public function getId(): int;

    /**
     * 读取 TOKEN.
     * @throws BusinessException
     */
    public function getToken(): string;
}
