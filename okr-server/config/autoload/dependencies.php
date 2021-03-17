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
return [
    Hyperf\Contract\StdoutLoggerInterface::class => App\Kernel\Log\LoggerFactory::class,
    Hyperf\Server\Listener\AfterWorkerStartListener::class => App\Kernel\Http\WorkerStartListener::class,

    // 业务类映射关系
    App\Contract\UserAuthInterface::class => App\Service\UserAuth\RedisUserAuth::class,
    App\Contract\PassworderInterface::class => App\Service\Passworder::class,
    App\Contract\CodeSenderInterface::class => App\Service\CodeSender\EmailCodeSender::class,
    App\Contract\CodeGeneratorInterface::class => App\Service\CodeGenerator\NumberCodeGenerator::class,
];
