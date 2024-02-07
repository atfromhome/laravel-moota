<?php

declare(strict_types=1);

return [
    'webhook_call' => [
        'table' => 'moota_webhook_calls',

        'model' => FromHome\Moota\Models\WebhookCall::class,

        'signature_secret' => env('MOOTA_SIGNATURE_SECRET'),
    ],
];
