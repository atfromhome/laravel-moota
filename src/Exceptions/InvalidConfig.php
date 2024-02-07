<?php

declare(strict_types=1);

namespace FromHome\Moota\Exceptions;

use Exception;
use FromHome\Moota\Jobs\ProcessWebhookJob;

final class InvalidConfig extends Exception
{
    public static function invalidProcessWebhookJob(string $processWebhookJob): self
    {
        $abstractProcessWebhookJob = ProcessWebhookJob::class;

        return new self("`{$processWebhookJob}` is not a valid process webhook job class. A valid class should implement `{$abstractProcessWebhookJob}`.");
    }

    public static function signingSecretNotSet(): self
    {
        return new self('The webhook signing secret is not set. Make sure that the `signing_secret` config key is set to the correct value.');
    }
}
