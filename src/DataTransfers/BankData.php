<?php

declare(strict_types=1);

namespace FromHome\Moota\DataTransfers;

use Spatie\LaravelData\Data;

final class BankData extends Data
{
    public function __construct(
        public readonly string $id,
        public readonly float|int $price,
        public readonly string $label
    ) {}
}
