<?php

declare(strict_types=1);

namespace Src\BoundedContext\Clients\Domain\Contract;

use Src\BoundedContext\Clients\Domain\Client;
use Src\BoundedContext\Clients\Domain\ValueObjects\ClientId;

interface ClientRepository
{

    public function save(Client $client): void;

    public function delete(ClientId $clientId): void;

    public function update(ClientId $clientId, Client $client): void;

    public function searchAll(): array;

    public function searchById(ClientId $clientId): ?Client;
}
