<?php

declare(strict_types=1);

namespace FromHome\Moota\Http\Integrations\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class DeleteWebhookRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        private readonly string|int $webhookId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/integration/webhook/'.$this->webhookId;
    }
}
