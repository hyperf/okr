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
use Hyperf\Config\Annotation\Value;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class EmailCodeSender implements CodeSenderInterface
{
    /**
     * @Value(key="code_sender.email.host")
     * @var string
     */
    protected $host;

    /**
     * @Value(key="code_sender.email.username")
     * @var string
     */
    protected $username;

    /**
     * @Value(key="code_sender.email.password")
     * @var string
     */
    protected $password;

    /**
     * @Value(key="code_sender.email.port")
     * @var int
     */
    protected $port;

    public function send(string $name, string $code): void
    {
        $mail = new PHPMailer(true); // 初始化 PHPMailer
        $mail->SMTPDebug = SMTP::DEBUG_SERVER; // 启用详细调试输出
        $mail->isSMTP(); // 使用 SMTP 发送邮件
        $mail->Host = $this->host; // 设置 SMTP 服务器地址
        $mail->SMTPAuth = true; // 启用SMTP身份验证
        $mail->Username = $this->username; // SMTP 用户名
        $mail->Password = $this->password; // SMTP 密码
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // 启用 TLS 加密
        $mail->Port = $this->port; // TCP 端口

        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = '验证码';
        $mail->CharSet = 'UTF-8';
        $mail->Body = $code;

        $mail->setFrom($this->username, 'OKR Email Sender');

        $mail->addAddress($name);

        $mail->send(); // 发送邮件
    }
}
