<?php

declare(strict_types=1);

namespace FromHome\Moota\DataTransfers;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
final class WebhookUrlData extends Data
{
    public function __construct(
        public readonly string $webhookId,
        public readonly string $url,
        public readonly string $secretToken,
        public readonly ?string $kinds,
        #[MapInputName('bank_account_id')]
        public readonly ?string $bankId,
    ) {
    }
}
