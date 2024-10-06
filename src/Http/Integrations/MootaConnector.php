<?php

declare(strict_types=1);

namespace FromHome\Moota\Http\Integrations;

use Saloon\Http\Request;
use Saloon\Http\Connector;
use Saloon\Contracts\Sender;
use Saloon\HttpSender\HttpSender;
use Saloon\Contracts\Authenticator;
use Saloon\PaginationPlugin\Paginator;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\PaginationPlugin\Contracts\HasPagination;

final class MootaConnector extends Connector implements HasPagination
{
    public function __construct(
        private readonly string $token
    ) {}

    public function resolveBaseUrl(): string
    {
        return 'https://app.moota.co/api/v2';
    }

    public function paginate(Request $request): Paginator
    {
        return new MootaPaginator($this, $request);
    }

    protected function defaultAuth(): ?Authenticator
    {
        return new TokenAuthenticator(
            $this->token
        );
    }

    protected function defaultSender(): Sender
    {
        return \resolve(HttpSender::class);
    }
}
