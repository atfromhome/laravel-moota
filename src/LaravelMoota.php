<?php

declare(strict_types=1);

namespace FromHome\Moota;

use Illuminate\Http\Request;
use Webmozart\Assert\Assert;
use FromHome\Moota\Jobs\ProcessWebhookJob;
use FromHome\Moota\Database\Eloquent\WebhookCall;

final class LaravelMoota
{
    private static ?string $jobClass = null;

    public static function getWebhookCallTableName(?string $default = null): string
    {
        return \config('moota.webhook_call.table', $default);
    }

    /**
     * @return class-string<WebhookCall>
     */
    public static function getWebhookCallModelClass(?string $default = null): string
    {
        return \config('moota.webhook_call.model', $default);
    }

    public static function registerWebhookCallJob(string $className): void
    {
        Assert::classExists($className);

        self::$jobClass = $className;
    }

    /**
     * @return class-string<ProcessWebhookJob>
     */
    public static function getProcessWebhookCallJobClass(): string
    {
        Assert::notNull(self::$jobClass);

        return self::$jobClass;
    }

    public static function dispatchProcessWebhookJob(WebhookCall $webhookCall): void
    {
        self::getProcessWebhookCallJobClass()::dispatch($webhookCall);
    }

    public static function storeWebhookCall(Request $request): WebhookCall
    {
        return self::getWebhookCallModelClass()::storeFromRequest($request);
    }
}
