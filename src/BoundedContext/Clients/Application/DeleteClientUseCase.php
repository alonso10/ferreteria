<?php
declare(strict_types=1);

namespace Src\BoundedContext\Clients\Application;


use Src\BoundedContext\Clients\Domain\Contract\ClientRepository;
use Src\BoundedContext\Clients\Domain\ValueObjects\ClientId;

class DeleteClientUseCase
{

    private $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $clientId): void {
        $id = new ClientId($clientId);

        $this->repository->delete($id);
    }

}
