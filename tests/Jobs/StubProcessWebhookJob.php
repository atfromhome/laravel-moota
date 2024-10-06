<?php

declare(strict_types=1);

namespace FromHome\Moota\Tests\Jobs;

use FromHome\Moota\Jobs\ProcessWebhookJob;

final class StubProcessWebhookJob extends ProcessWebhookJob
{
    public function handle(): void {}
}
