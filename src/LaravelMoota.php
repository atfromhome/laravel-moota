<?php

declare(strict_types=1);

namespace FromHome\Moota;

use Illuminate\Http\Request;
use Webmozart\Assert\Assert;
use Illuminate\Support\Facades\Route;
use FromHome\Moota\Jobs\ProcessWebhookJob;
use FromHome\Moota\Database\Eloquent\WebhookCall;
use FromHome\Moota\Http\Controllers\WebhookHandlerController;

final class LaravelMoota
{
    /**
     * @var class-string<ProcessWebhookJob>|null
     */
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

    /**
     * @param  class-string<ProcessWebhookJob>  $className
     */
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
        $jobClass = self::$jobClass;

        Assert::notNull($jobClass);

        return $jobClass;
    }

    public static function dispatchProcessWebhookJob(WebhookCall $webhookCall): void
    {
        $webhookCall->clearException();

        self::getProcessWebhookCallJobClass()::dispatch($webhookCall);
    }

    public static function storeWebhookCall(Request $request): WebhookCall
    {
        return self::getWebhookCallModelClass()::storeFromRequest($request);
    }

    public static function routes(): void
    {
        Route::post('/moota/webhook/handler', [WebhookHandlerController::class, 'store']);
    }
}
