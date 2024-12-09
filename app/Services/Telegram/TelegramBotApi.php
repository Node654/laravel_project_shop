<?php

namespace App\Services\Telegram;

use App\Services\Telegram\Exceptions\TelegramBotApiException;
use Illuminate\Support\Facades\Http;
use Throwable;

class TelegramBotApi
{
    private const HOST = 'https://api.telegram.org/bot';

    public static function sendMessage(int $chatId, string $token, string $text): bool
    {
        try {
            $response = Http::timeout(2)->get(self::HOST.$token.'/sendMessage', [
                'chat_id' => $chatId,
                'text' => $text,
            ])->throw()->json();

            return $response['ok'] ?? false;
        } catch (Throwable $e) {
            report(new TelegramBotApiException($e->getMessage()));

            return false;
        }
    }
}
