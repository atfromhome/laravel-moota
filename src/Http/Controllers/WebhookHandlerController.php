<?php

declare(strict_types=1);

namespace FromHome\Moota\Http\Controllers;

use Illuminate\Http\Request;
use FromHome\Moota\LaravelMoota;
use Illuminate\Http\JsonResponse;
use FromHome\Moota\Exceptions\InvalidConfig;
use FromHome\Moota\WebhookSignatureValidator;

final class WebhookHandlerController
{
    public function store(Request $request, WebhookSignatureValidator $signatureValidator): JsonResponse
    {
        try {
            if ($signatureValidator->isValid($request)) {
                $webhookCall = LaravelMoota::storeWebhookCall($request);

                LaravelMoota::dispatchProcessWebhookJob($webhookCall);

                return new JsonResponse(null, 204);
            }

            return new JsonResponse([
                'message' => 'Invalid signature',
            ], 422);
        } catch (InvalidConfig $exception) {
            return new JsonResponse([
                'message' => $exception->getMessage(),
            ], 500);
        }
    }
}
