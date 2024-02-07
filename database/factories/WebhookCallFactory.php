<?php

declare(strict_types=1);

namespace FromHome\Moota\Database\Factories;

use JsonException;
use FromHome\Moota\LaravelMoota;
use FromHome\Moota\Models\WebhookCall;
use Illuminate\Database\Eloquent\Factories\Factory;

final class WebhookCallFactory extends Factory
{
    protected $model = WebhookCall::class;

    /**
     * @throws JsonException
     */
    public function definition(): array
    {
        return [
            'headers' => \json_decode(<<<'JSON'
{
   "X-MOOTA-USER": "lkjqwle",
   "X-MOOTA-WEBHOOK": "oiuoiuqwe",
   "User-Agent": "MootaBot/1.5",
   "Signature": "oiuqwknlasdkuovasl;dkjzx..",
   "Content-Type": "application/json",
   "Accept": "application/json"
}
JSON, false, 512, JSON_THROW_ON_ERROR),
            'payload' => \json_decode(<<<'JSON'
[
   {
      "account_number": "12312412312",
      "date": "2019-11-10 14:33:01",
      "description": "TRSF E-BANKING CR 11/10 124123 MOOTA CO",
      "amount": 50000,
      "type": "CR",
      "note": "Testing webhook moota",
      "balance": 520000,
      "created_at": "2019-11-10 14:33:01",
      "updated_at": "2019-11-10 14:33:01",
      "mutation_id": "IHBb97sba7d",
      "token": "OASiuh(DYNb97",
      "bank_id": "Aslx120mlw",
      "taggings": [],
      "bank": {
         "corporate_id": null,
         "username": "testing username",
         "atas_nama": "moota",
         "balance": "8704362.00",
         "account_number": "123123123123",
         "bank_type": "bri",
         "pkg": null,
         "login_retry": 0,
         "date_from": "2019-11-10 14:33:01",
         "date_to": "2019-11-10 14:33:01",
         "meta": [],
         "interval_refresh": 15,
         "next_queue": "2019-11-10 14:33:01",
         "is_active": false,
         "in_queue": 0,
         "in_progress": 0,
         "is_crawling": 1,
         "recurred_at": "2019-11-10 14:33:01",
         "status": null,
         "ip_address": null,
         "ip_address_expired_at": null,
         "created_at": "2019-11-10 14:33:01",
         "token": "Aslx120mlw",
         "bank_id": "Aslx120mlw",
         "label": "BRI",
         "last_update": "",
         "icon": ""
      }
   },
   {
      "account_number": "12312412312",
      "date": "2019-11-10 14:33:01",
      "description": "TRSF E-BANKING CR 11/10 124123 MOOTA CO",
      "amount": 50000,
      "type": "CR",
      "note": "Testing webhook moota",
      "balance": 520000,
      "created_at": "2019-11-10 14:33:01",
      "updated_at": "2019-11-10 14:33:01",
      "mutation_id": "IHBb97sba7d",
      "token": "OASiuh(DYNb97",
      "bank_id": "Aslx120mlw",
      "taggings": [],
      "bank": {
         "corporate_id": null,
         "username": "testing username",
         "atas_nama": "moota",
         "balance": "8704362.00",
         "account_number": "123123123123",
         "bank_type": "bri",
         "pkg": null,
         "login_retry": 0,
         "date_from": "2019-11-10 14:33:01",
         "date_to": "2019-11-10 14:33:01",
         "meta": [],
         "interval_refresh": 15,
         "next_queue": "2019-11-10 14:33:01",
         "is_active": false,
         "in_queue": 0,
         "in_progress": 0,
         "is_crawling": 1,
         "recurred_at": "2019-11-10 14:33:01",
         "status": null,
         "ip_address": null,
         "ip_address_expired_at": null,
         "created_at": "2019-11-10 14:33:01",
         "token": "Aslx120mlw",
         "bank_id": "Aslx120mlw",
         "label": "BRI",
         "last_update": "",
         "icon": ""
      }
   }
]
JSON, false, 512, JSON_THROW_ON_ERROR),
            'exception' => null,
        ];
    }

    public function modelName(): string
    {
        return LaravelMoota::getWebhookCallModelClass(
            parent::modelName()
        );
    }
}
