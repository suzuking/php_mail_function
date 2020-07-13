<?php
require_once 'vendor/autoload.php';
require_once 'setting.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

function send_php_mail($to_address, $subject, $body, $from_email_address, $from_name)
{
    $log = new Logger('Mail');
    $log->pushHandler(new StreamHandler(LOG_FILE_PATH));

    try {
        $log->info('Start Mail: ' . $to_address);
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
        $result = $mailer->send($message);
        $log->info('Finish Mail: ' . $result);

        return $result;
    } catch (Exception $e) {
        $log->error($e->getMessage());
    }
}

