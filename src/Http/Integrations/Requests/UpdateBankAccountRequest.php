<?php

declare(strict_types=1);

namespace FromHome\Moota\Http\Integrations\Requests;

use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use FromHome\Moota\DataTransfers\BankAccountData;
use FromHome\Moota\Http\Integrations\Inputs\BankAccountInput;

final class UpdateBankAccountRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly string|int $bankId,
        private readonly BankAccountInput $input
    ) {}

    public function resolveEndpoint(): string
    {
        return '/bank/update/'.$this->bankId;
    }

    protected function defaultBody(): array
    {
        return $this->input->toArray();
    }

    /**
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): BankAccountData
    {
        return BankAccountData::from(
            $response->json('bank')
        );
    }
}
