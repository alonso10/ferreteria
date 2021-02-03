<?php
declare(strict_types=1);

namespace Src\BoundedContext\Clients\Application;


use Src\BoundedContext\Clients\Domain\Client;
use Src\BoundedContext\Clients\Domain\Contract\ClientRepository;
use Src\BoundedContext\Clients\Domain\ValueObjects\ClientId;

class GetClientByIdUseCase
{
    private $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }


    public function __invoke(string $clientId): ?Client
    {
        $id = new ClientId($clientId);
        return $this->repository->searchById($id);
    }

}
