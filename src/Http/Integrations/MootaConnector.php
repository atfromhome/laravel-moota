<?php

declare(strict_types=1);

namespace FromHome\Moota\Http\Integrations;

use Saloon\Http\Connector;

final class MootaConnector extends Connector
{
    public function resolveBaseUrl(): string
    {
        return '';
    }
}
