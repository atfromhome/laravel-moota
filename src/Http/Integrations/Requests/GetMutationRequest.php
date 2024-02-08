<?php

declare(strict_types=1);

namespace FromHome\Moota\Http\Integrations\Requests;

use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Spatie\LaravelData\DataCollection;
use FromHome\Moota\DataTransfers\MutationData;
use FromHome\Moota\Http\Integrations\Inputs\FilterMutationInput;

final class GetMutationRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly ?FilterMutationInput $input,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/mutation';
    }

    protected function defaultQuery(): array
    {
        return [
            'page' => 1,
            'type' => $this->input?->type,
            'bank' => $this->input?->bankId,
            'start_date' => $this->input?->startDate?->format('Y-m-d'),
            'end_date' => $this->input?->endDate?->format('Y-m-d'),
        ];
    }

    /**
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): DataCollection
    {
        return new DataCollection(MutationData::class, $response->json('data'));
    }
}
