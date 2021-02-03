<?php


namespace App\Http\Controllers;


use App\Http\Resources\ClientResource;
use Illuminate\Http\Request;
use Src\BoundedContext\Clients\Infrastructure\Controller\AllClientController;

class GetAllClientController extends Controller
{

    private $allClientController;

    public function __construct(AllClientController $allClientController)
    {
        $this->allClientController = $allClientController;
    }


    public function __invoke(Request $request) {
        $records = $this->allClientController->__invoke($request);
        $clients = [];
        if (count($records)) {
            $clients = new ClientResource(collect($records));
        }
        return response()->json($clients);
    }
}
