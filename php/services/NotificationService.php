<?php

namespace services;

class NotificationService
{
    public function sendEmail(string $email, string $message): void
    {
        echo "Email envoyé à {$email} : {$message}" . PHP_EOL;
    }
}