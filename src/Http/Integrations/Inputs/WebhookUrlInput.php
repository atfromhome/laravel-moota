<?php

declare(strict_types=1);

namespace FromHome\Moota\Http\Integrations\Inputs;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Attributes\Validation\In;
use Spatie\LaravelData\Attributes\Validation\Url;

#[MapName(SnakeCaseMapper::class)]
final class WebhookUrlInput extends Data
{
    public function __construct(
        #[Url]
        public readonly string $url,
        #[In(['credit', 'debit'])]
        public readonly string $kinds,
        public readonly string $secretToken,
        public readonly int $startUniqueCode = 1,
        public readonly int $endUniqueCode = 999,
        public readonly ?string $bankAccountId = null,
    ) {}
}
