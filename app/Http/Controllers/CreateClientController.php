<?php

namespace App\Http\Controllers;


use App\Http\Requests\ClientPostValidate;
use Src\BoundedContext\Clients\Infrastructure\Controller\CreateClientController as CreateClient;


class CreateClientController
{

    private $createClientController;

    public function __construct(CreateClient  $clientController)
    {
        $this->createClientController = $clientController;
    }

    public function __invoke(ClientPostValidate $request)
    {
        $request->validated();
        $this->createClientController->__invoke($request);
        return response()->json(['message' => 'Client created'], 201);
    }

}
