<?php


namespace Src\BoundedContext\Clients\Infrastructure\Controller;

use Illuminate\Http\Request;
use Src\BoundedContext\Clients\Application\GetClientByIdUseCase;
use Src\BoundedContext\Clients\Application\UpdateClientUseCase;
use Src\BoundedContext\Clients\Domain\Client;
use Src\BoundedContext\Clients\Infrastructure\Repositories\EloquentClientRepository;

class UpdateClientController
{

    /**
     * @var EloquentClientRepository
     */
    private $repository;

    public function __construct(EloquentClientRepository $repository)
    {
        $this->repository = $repository;
    }


    public function __invoke(Request $request): ?Client
    {
        $clientId = $request->id;

        $getClient = new GetClientByIdUseCase($this->repository);
        $client = $getClient->__invoke($clientId);

        $firstName          = $request->input('firstName') ?? $client->firstName()->value();
        $secondName         = $request->input('secondName') ?? $client->secondName()->value();
        $surname            = $request->input('surname') ?? $client->surname()->value();
        $secondSurname      = $request->input('secondSurname') ?? $client->secondSurname()->value();
        $email              = $request->input('email') ?? $client->email()->value();
        $address            = $request->input('address') ?? $client->address()->value();
        $phone              = $request->input('phone') ?? $client->phone()->value();
        $job                = $request->input('job') ?? $client->job()->value();
        $department         = $request->input('department') ?? $client->department()->value();
        $city               = $request->input('city') ?? $client->city()->value();
        $identification     = $request->input('identification') ?? $client->identification()->value();
        $identificationType = $request->input('identificationType') ?? $client->identificationType()->value();

        $updateClientUseCase = new UpdateClientUseCase($this->repository);

        $updateClientUseCase->__invoke(
            $clientId,
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

        return $getClient->__invoke($clientId);
    }

}
