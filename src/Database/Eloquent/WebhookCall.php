<?php

declare(strict_types=1);

namespace FromHome\Moota\Database\Eloquent;

use Illuminate\Http\Request;
use FromHome\Moota\LaravelMoota;
use Spatie\LaravelData\DataCollection;
use Illuminate\Database\Eloquent\Model;
use FromHome\Moota\DataTransfers\MutationData;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

abstract class WebhookCall extends Model
{
    use HasUlids;

    protected $guarded = [];

    protected $casts = [
        'payload' => 'array',
        'headers' => 'array',
        'exception' => 'string',
    ];

    public function getTable(): string
    {
        return LaravelMoota::getWebhookCallTableName(
            parent::getTable()
        );
    }

    public static function storeFromRequest(Request $request): self
    {
        /** @var self */
        return self::query()->create([
            'payload' => $request->input(),
            'headers' => $request->header(),
        ]);
    }

    public function getPayloadData(): DataCollection
    {
        return new DataCollection(
            MutationData::class, $this->getAttribute('payload')
        );
    }
}
