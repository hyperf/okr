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
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class EmailCodeSender implements CodeSenderInterface
{
    public function send(string $name): string
    {
        $mail = new PHPMailer(true); // 初始化 PHPMailer
        $mail->SMTPDebug     = SMTP::DEBUG_SERVER; // 启用详细调试输出
        $mail->isSMTP(); // 使用 SMTP 发送邮件
        $mail->Host          = config('email.host'); // 设置 SMTP 服务器地址
        $mail->SMTPAuth      = true; // 启用SMTP身份验证
        $mail->Username      = config('email.username'); // SMTP 用户名
        $mail->Password      = config('email.password'); // SMTP 密码
        $mail->SMTPSecure    = PHPMailer::ENCRYPTION_STARTTLS; // 启用 TLS 加密
        $mail->Port          = config('email.port'); // TCP 端口

        $mail->send(); // 发送邮件
    }

    public function verify(string $name, string $code): bool
    {
        return false;
    }
}
