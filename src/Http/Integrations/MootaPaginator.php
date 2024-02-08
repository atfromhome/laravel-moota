<?php

declare(strict_types=1);

namespace FromHome\Moota\Http\Integrations;

use JsonException;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\PagedPaginator;

final class MootaPaginator extends PagedPaginator
{
    protected ?int $perPageLimit = 100;

    /**
     * @throws JsonException
     */
    protected function isLastPage(Response $response): bool
    {
        return \is_null($response->json('next_page_url'));
    }

    /**
     * @throws JsonException
     */
    protected function getPageItems(Response $response, Request $request): array
    {
        return $response->json('data');
    }
}
