<?php

declare(strict_types=1);

namespace FromHome\Moota\DataTransfers;

use DateTime;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
final class MutationData extends Data
{
    public function __construct(
        public readonly string $mutationId,
        public readonly string $bankId,
        public readonly DateTime $date,
        public readonly string $type,
        public readonly float|int $amount,
        public readonly string $description,
        public readonly BankData $bank,
    ) {
    }
}
