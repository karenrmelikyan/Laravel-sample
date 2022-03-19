<?php

namespace App\Services\Notifiers;

class TelegramNotifier implements NotifierInterface
{
    /**
     *  Telegram bot name is "MyLaravelNotifierBot"
     */

    const TOKEN = '5009853729:AAFUBHMVdiwS1qsatZKzwiVW_zwSoRkh3kk';
    const CHAT_ID = '911933093';

    public function sendNotification(string $message): bool|string
    {
        $apiToken = self::TOKEN;
        $data = [
            'chat_id' => self::CHAT_ID,
            'text' => $message,
        ];

        return file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .
            http_build_query($data) );
    }
}

