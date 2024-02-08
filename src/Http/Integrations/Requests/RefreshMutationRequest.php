<?php

declare(strict_types=1);

namespace FromHome\Moota\Http\Integrations\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class RefreshMutationRequest extends Request
{
    protected Method $method = Method::POST;

    public function __construct(
        private readonly string|int $bankId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/bank/'.$this->bankId.'/refresh';
    }
}
