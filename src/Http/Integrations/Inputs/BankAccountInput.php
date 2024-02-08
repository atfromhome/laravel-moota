<?php

declare(strict_types=1);

namespace FromHome\Moota\Http\Integrations\Inputs;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
final class BankAccountInput extends Data
{
    public function __construct(
        public readonly string $corporateId,
        public readonly string $bankType,
        public readonly string $username,
        public readonly string $password,
        public readonly string $nameHolder,
        public readonly string $accountNumber,
        public readonly bool $isActive = true,
    ) {
    }
}
