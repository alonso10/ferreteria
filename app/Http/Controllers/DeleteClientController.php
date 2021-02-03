<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Src\BoundedContext\Clients\Infrastructure\Controller\DeleteClientController as DeleteController;

class DeleteClientController
{

    private $deleteController;

    public function __construct(DeleteController $controller)
    {
        $this->deleteController = $controller;
    }

    public function __invoke(Request $request)
    {
        $this->deleteController->__invoke($request);
        return response([], 204);
    }
}
