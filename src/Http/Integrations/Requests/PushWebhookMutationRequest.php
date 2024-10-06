<?php

declare(strict_types=1);

namespace FromHome\Moota\Http\Integrations\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class PushWebhookMutationRequest extends Request
{
    protected Method $method = Method::POST;

    public function __construct(
        private readonly string|int $mutationId,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/mutation/'.$this->mutationId.'/webhook';
    }
}
