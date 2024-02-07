<?php

declare(strict_types=1);

namespace FromHome\Moota\Http\Controllers;

use Illuminate\Http\Request;
use FromHome\Moota\LaravelMoota;
use Illuminate\Http\JsonResponse;

final class WebhookHandlerController
{
    public function store(Request $request): JsonResponse
    {
        $webhookCall = LaravelMoota::storeWebhookCall($request);

        LaravelMoota::dispatchProcessWebhookJob($webhookCall);

        return new JsonResponse(null, 204);
    }
}
