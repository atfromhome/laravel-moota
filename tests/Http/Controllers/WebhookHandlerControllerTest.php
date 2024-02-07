<?php

declare(strict_types=1);

namespace FromHome\Moota\Tests\Http\Controllers;

use FromHome\Moota\LaravelMoota;
use FromHome\Moota\Tests\TestCase;
use Illuminate\Support\Facades\Bus;
use FromHome\Moota\DataTransfers\MutationData;
use FromHome\Moota\Database\Eloquent\WebhookCall;
use FromHome\Moota\Tests\Jobs\StubProcessWebhookJob;

final class WebhookHandlerControllerTest extends TestCase
{
    public function test_can_process_webhook_callback(): void
    {
        LaravelMoota::registerWebhookCallJob(StubProcessWebhookJob::class);

        Bus::fake(StubProcessWebhookJob::class);

        $data = \json_decode(\file_get_contents(__DIR__.'/../../../data/webhook-body.json'), true, 512, JSON_THROW_ON_ERROR);
        $header = \json_decode(\file_get_contents(__DIR__.'/../../../data/webhook-header.json'), true, 512, JSON_THROW_ON_ERROR);

        $this->postJson('/moota/webhook/handler', $data, $header)->assertSuccessful();

        /** @var WebhookCall $webhookCall */
        $webhookCall = LaravelMoota::getWebhookCallModelClass()::query()->first();
        $this->assertNotNull($webhookCall);

        $dataCollection = $webhookCall->getPayloadData();
        $this->assertCount(2, $dataCollection);

        $mutation = $dataCollection->first();
        $this->assertInstanceOf(MutationData::class, $mutation);
        $this->assertSame($mutation->mutationId, $data[0]['mutation_id']);
        $this->assertSame($mutation->bank->bankId, $data[0]['bank']['bank_id']);

        Bus::assertDispatched(StubProcessWebhookJob::class);
    }
}
