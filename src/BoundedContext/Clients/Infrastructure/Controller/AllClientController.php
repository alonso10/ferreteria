<?php
declare(strict_types=1);

namespace Src\BoundedContext\Clients\Infrastructure\Controller;

use Illuminate\Http\Request;
use Src\BoundedContext\Clients\Application\AllClientUseCase;
use Src\BoundedContext\Clients\Infrastructure\Repositories\EloquentClientRepository;


class AllClientController
{
    private $repository;

    public function __construct(EloquentClientRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request): array {
        $allClientUseCase = new AllClientUseCase($this->repository);
        return $allClientUseCase->__invoke();
    }

}
