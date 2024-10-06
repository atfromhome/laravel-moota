<?php

declare(strict_types=1);

namespace FromHome\Moota\Jobs;

use Throwable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use FromHome\Moota\Database\Eloquent\WebhookCall;

abstract class ProcessWebhookJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        public WebhookCall $webhookCall
    ) {}

    public function failed(Throwable $exception): void
    {
        $this->webhookCall->saveException($exception);
    }
}
