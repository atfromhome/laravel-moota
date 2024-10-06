<?php

declare(strict_types=1);

namespace FromHome\Moota\DataTransfers;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
final class BankAccountData extends Data
{
    public function __construct(
        public readonly string $bankId,
        public readonly string $label,
        public readonly string $accountNumber
    ) {}
}
