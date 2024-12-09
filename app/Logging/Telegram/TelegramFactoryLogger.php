<?php

namespace App\Logging\Telegram;

use Monolog\Logger;

class TelegramFactoryLogger
{
    public function __invoke(array $config): Logger
    {
        $logger = new Logger('telegram');
        $logger->pushHandler(new TelegramHandler($config));

        return $logger;
    }
}
