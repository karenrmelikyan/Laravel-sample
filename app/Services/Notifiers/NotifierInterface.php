<?php

declare(strict_types=1);

namespace App\Services\Notifiers;

interface NotifierInterface
{
    public function sendNotification(string $message): bool|string;
}
