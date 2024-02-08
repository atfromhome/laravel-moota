<?php

declare(strict_types=1);

namespace FromHome\Moota\Http\Integrations\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use FromHome\Moota\Http\Integrations\Inputs\WebhookUrlInput;

final class CreateWebhookRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly WebhookUrlInput $input
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/integration/webhook';
    }

    protected function defaultBody(): array
    {
        return $this->input->toArray();
    }
}
