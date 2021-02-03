<?php
declare(strict_types=1);

namespace Src\BoundedContext\Clients\Infrastructure\Controller;


use Illuminate\Http\Request;
use Src\BoundedContext\Clients\Application\DeleteClientUseCase;
use Src\BoundedContext\Clients\Infrastructure\Repositories\EloquentClientRepository;


class DeleteClientController
{

    private $repository;

    public function __construct(EloquentClientRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $clientId = $request->id;

        $deleteUseCase = new DeleteClientUseCase($this->repository);
        $deleteUseCase->__invoke($clientId);
    }
}
