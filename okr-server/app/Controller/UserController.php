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
namespace App\Controller;

use App\Request\SendCodeRequest;
use App\Service\UserRegisterService;
use Hyperf\Di\Annotation\Inject;

class UserController extends Controller
{
    /**
     * @Inject
     * @var UserRegisterService
     */
    protected $register;

    public function sendCode(SendCodeRequest $request)
    {
        $name = $request->input('name');

        $res = $this->register->sendCode($name);

        return $this->response->success($res);
    }
}
