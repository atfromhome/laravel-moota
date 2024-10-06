<?php

declare(strict_types=1);

namespace FromHome\Moota\Http\Integrations\Inputs;

use DateTime;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Attributes\Validation\In;

#[MapName(SnakeCaseMapper::class)]
final class FilterMutationInput extends Data
{
    public function __construct(
        #[In(['CR', 'DB'])]
        public readonly ?string $type = null,
        public readonly null|string|int $bankId = null,
        public readonly ?DateTime $startDate = null,
        public readonly ?DateTime $endDate = null,
    ) {}
}
