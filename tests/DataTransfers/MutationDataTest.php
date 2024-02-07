<?php

declare(strict_types=1);

namespace FromHome\Moota\Tests\DataTransfers;

use FromHome\Moota\Tests\TestCase;
use FromHome\Moota\DataTransfers\MutationData;

final class MutationDataTest extends TestCase
{
    public function test_can_create_mutation_data_from_array(): void
    {
        $data = \json_decode(\file_get_contents(__DIR__.'/../../data/mutation.json'), true, 512, JSON_THROW_ON_ERROR);

        $mutation = MutationData::from($data);

        $this->assertSame($mutation->mutationId, $data['mutation_id']);
        $this->assertSame($mutation->bankId, $data['bank_id']);
        $this->assertSame($mutation->date->format('Y-m-d H:i:s'), $data['date']);
        $this->assertSame($mutation->type, $data['type']);
        $this->assertSame($mutation->amount, $data['amount']);
        $this->assertSame($mutation->description, $data['description']);

        $this->assertSame($mutation->bank->bankId, $data['bank']['bank_id']);
        $this->assertSame($mutation->bank->label, $data['bank']['label']);
        $this->assertSame($mutation->bank->accountNumber, $data['bank']['account_number']);
    }

    public function test_can_create_mutation_data_from_array_with_bank_null(): void
    {
        $data = \json_decode(
            \file_get_contents(__DIR__.'/../../data/mutation-with-bank-null.json'),
            true,
            512,
            JSON_THROW_ON_ERROR
        );

        $mutation = MutationData::from($data);

        $this->assertSame($mutation->mutationId, $data['mutation_id']);
        $this->assertSame($mutation->bankId, $data['bank_id']);
        $this->assertSame($mutation->date->format('Y-m-d H:i:s'), $data['date']);
        $this->assertSame($mutation->type, $data['type']);
        $this->assertSame($mutation->amount, $data['amount']);
        $this->assertSame($mutation->description, $data['description']);

        $this->assertNull($mutation->bank);
    }
}
