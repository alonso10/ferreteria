<?php
declare(strict_types=1);

namespace Src\BoundedContext\Clients\Infrastructure\Controller;


use Illuminate\Http\Request;
use Src\BoundedContext\Clients\Application\CreateClientUseCase;
use Src\BoundedContext\Clients\Infrastructure\Repositories\EloquentClientRepository;


class CreateClientController
{

    private $repository;

    public function __construct(EloquentClientRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request) {
        $firstName          = $request->input('firstName');
        $secondName         = $request->input('secondName');
        $surname            = $request->input('surname');
        $secondSurname      = $request->input('secondSurname');
        $email              = $request->input('email');
        $address            = $request->input('address');
        $phone              = $request->input('phone');
        $job                = $request->input('job');
        $department         = $request->input('department');
        $city               = $request->input('city');
        $identification     = $request->input('identification');
        $identificationType = $request->input('identificationType');

        $createClientUseCase = new CreateClientUseCase($this->repository);

        return $createClientUseCase->__invoke(
            $email,
            $firstName,
            $secondName,
            $surname,
            $secondSurname,
            $address,
            $phone,
            $job,
            $department,
            $city,
            $identification,
            $identificationType
        );
    }
}
