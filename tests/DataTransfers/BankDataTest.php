<?php

declare(strict_types=1);

namespace FromHome\Moota\Tests\DataTransfers;

use FromHome\Moota\Tests\TestCase;
use FromHome\Moota\DataTransfers\BankData;

final class BankDataTest extends TestCase
{
    public function test_can_create_bank_data_from_array(): void
    {
        $data = \json_decode(\file_get_contents(__DIR__.'/../../data/bank.json'), true, 512, JSON_THROW_ON_ERROR);

        $bank = BankData::from($data);

        $this->assertSame($bank->bankId, $data['bank_id']);
        $this->assertSame($bank->label, $data['label']);
        $this->assertSame($bank->accountNumber, $data['account_number']);
    }
}
