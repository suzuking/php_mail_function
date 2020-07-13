<?php
require_once 'vendor/autoload.php';
require_once 'setting.php';

function send_php_mail($to_address, $subject, $body, $from_email_address, $from_name)
{
    $transport = new Swift_SmtpTransport(SMTP_SERVER, SMTP_PORT);
    $transport->setUsername(SMTP_USER);
    $transport->setPassword(SMTP_PASSWORD);

    $mailer = new Swift_Mailer($transport);

    $message = new Swift_Message($subject);
    $message->setFrom([$from_email_address => $from_name]);
    $message->setTo([$to_address]);
    $message->setBody(
        $body
    );

    return $mailer->send($message);
}

