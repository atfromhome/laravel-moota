<?php

declare(strict_types=1);

namespace FromHome\Moota;

use Illuminate\Http\Request;
use FromHome\Moota\Exceptions\InvalidConfig;

final class WebhookSignatureValidator
{
    /**
     * @throws InvalidConfig
     */
    public function isValid(Request $request): bool
    {
        $signature = $request->header('signature');

        if (! $signature) {
            return false;
        }

        $signingSecret = \config('moota.webhook_call.signature_secret');

        if (empty($signingSecret)) {
            throw InvalidConfig::signingSecretNotSet();
        }

        $computedSignature = \hash_hmac('sha256', $request->getContent(), $signingSecret);

        return \hash_equals($signature, $computedSignature);
    }
}
