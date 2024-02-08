<?php

declare(strict_types=1);

namespace FromHome\Moota\Http\Integrations\Requests;

use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Spatie\LaravelData\DataCollection;
use FromHome\Moota\DataTransfers\WebhookUrlData;

final class GetWebhookRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/integration/webhook';
    }

    /**
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): DataCollection
    {
        return new DataCollection(WebhookUrlData::class, $response->json('data'));
    }
}
