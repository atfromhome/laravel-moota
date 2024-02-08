<?php

declare(strict_types=1);

namespace FromHome\Moota\Http\Integrations\Requests;

use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Spatie\LaravelData\DataCollection;
use FromHome\Moota\DataTransfers\BankAccountData;

final class GetBankAccountRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/bank';
    }

    protected function defaultQuery(): array
    {
        return [
            'page' => 1,
        ];
    }

    /**
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): DataCollection
    {
        return new DataCollection(BankAccountData::class, $response->json('data'));
    }
}
