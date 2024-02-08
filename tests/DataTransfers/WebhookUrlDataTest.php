<?php

declare(strict_types=1);

namespace FromHome\Moota\Tests\DataTransfers;

use FromHome\Moota\Tests\TestCase;
use FromHome\Moota\DataTransfers\WebhookUrlData;

final class WebhookUrlDataTest extends TestCase
{
    public function test_can_create_webhook_data_from_array(): void
    {
        $data = \json_decode(\file_get_contents(__DIR__.'/../../data/webhook-url.json'), true, 512, JSON_THROW_ON_ERROR);

        $bank = WebhookUrlData::from($data);

        $this->assertSame($bank->bankId, $data['bank_account_id']);
        $this->assertSame($bank->webhookId, $data['webhook_id']);
        $this->assertSame($bank->url, $data['url']);
    }
}
