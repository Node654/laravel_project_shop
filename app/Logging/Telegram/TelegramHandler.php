<?php

namespace App\Logging\Telegram;

use App\Services\Telegram\TelegramBotApi;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;
use Monolog\LogRecord;

class TelegramHandler extends AbstractProcessingHandler
{
    private int $chatId;

    private string $token;

    public function __construct(array $config)
    {
        $level = Logger::toMonologLevel($config['level']);
        parent::__construct($level);
        $this->chatId = (int) $config['chat_id'];
        $this->token = $config['token'];
    }

    protected function write(LogRecord $record): void
    {
        TelegramBotApi::sendMessage($this->chatId, $this->token, $record->formatted);
    }
}
