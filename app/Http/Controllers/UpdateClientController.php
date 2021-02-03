<?php


namespace App\Http\Controllers;


use App\Http\Requests\ClientPostValidate;
use Illuminate\Http\JsonResponse;
use Src\BoundedContext\Clients\Infrastructure\Controller\UpdateClientController as UpdateController;

class UpdateClientController
{
    /**
     * @var UpdateController
     */
    private $updateClientController;

    public function __construct(UpdateController $controller)
    {
        $this->updateClientController = $controller;
    }

    public function __invoke(ClientPostValidate $request): JsonResponse
    {
        $request->validated();
        $this->updateClientController->__invoke($request);
        return response()->json(['message' => 'Client updated']);
    }
}
