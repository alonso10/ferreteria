<?php
declare(strict_types=1);

namespace Src\BoundedContext\Clients\Infrastructure\Repositories;

use App\Models\Client as ClientModel;
use Src\BoundedContext\Clients\Domain\Client;
use Src\BoundedContext\Clients\Domain\Contract\ClientRepository;
use Src\BoundedContext\Clients\Domain\ValueObjects\ClientAddress;
use Src\BoundedContext\Clients\Domain\ValueObjects\ClientCity;
use Src\BoundedContext\Clients\Domain\ValueObjects\ClientDepartment;
use Src\BoundedContext\Clients\Domain\ValueObjects\ClientEmail;
use Src\BoundedContext\Clients\Domain\ValueObjects\ClientFirstName;
use Src\BoundedContext\Clients\Domain\ValueObjects\ClientId;
use Src\BoundedContext\Clients\Domain\ValueObjects\ClientIdentification;
use Src\BoundedContext\Clients\Domain\ValueObjects\ClientIdentificationType;
use Src\BoundedContext\Clients\Domain\ValueObjects\ClientJob;
use Src\BoundedContext\Clients\Domain\ValueObjects\ClientPhone;
use Src\BoundedContext\Clients\Domain\ValueObjects\ClientSecondName;
use Src\BoundedContext\Clients\Domain\ValueObjects\ClientSecondSurname;
use Src\BoundedContext\Clients\Domain\ValueObjects\ClientSurname;


class EloquentClientRepository implements ClientRepository
{
    /**
     * @var ClientModel
     */
    private $eloquentModel;

    public function __construct()
    {
        $this->eloquentModel = new ClientModel();
    }

    public function save(Client $client): void
    {
        $newClient = $this->eloquentModel;

        $data = [
            'id'                    => $client->id()->value(),
            'first_name'            => $client->firstName()->value(),
            'second_name'           => $client->secondName()->value(),
            'surname'               => $client->surname()->value(),
            'second_surname'        => $client->surname()->value(),
            'email'                 => $client->email()->value(),
            'address'               => $client->address()->value(),
            'phone'                 => $client->phone()->value(),
            'job'                   => $client->job()->value(),
            'department'            => $client->department()->value(),
            'city'                  => $client->city()->value(),
            'identification'        => $client->identification()->value(),
            'identification_type'   => $client->identificationType()->value(),
        ];

        $newClient->fill($data);
        $newClient->save();
    }

    public function delete(ClientId $clientId): void
    {
        $this->eloquentModel
            ->findOrFail($clientId->value())
            ->delete();
    }

    public function update(ClientId $clientId, Client $client): void
    {
        $clientToUpdate = $this->eloquentModel;

        $data = [
            'first_name'            => $client->firstName()->value(),
            'second_name'           => $client->secondName()->value(),
            'surname'               => $client->surname()->value(),
            'second_surname'        => $client->surname()->value(),
            'email'                 => $client->email()->value(),
            'address'               => $client->address()->value(),
            'phone'                 => $client->phone()->value(),
            'job'                   => $client->job()->value(),
            'department'            => $client->department()->value(),
            'city'                  => $client->city()->value(),
            'identification'        => $client->identification()->value(),
            'identification_type'   => $client->identificationType()->value(),
        ];

        $clientToUpdate->findOrFail($clientId->value())->update($data);
    }

    public function searchAll(): array
    {
        return $this->eloquentModel::all()->toArray();
    }

    public function searchById(ClientId $clientId): ?Client
    {
        $clientEloquent = $this->eloquentModel->findOrFail($clientId->value());
        return Client::create(
            $clientId,
            new ClientEmail($clientEloquent->email),
            new ClientFirstName($clientEloquent->first_name),
            new ClientSecondName($clientEloquent->second_name),
            new ClientSurname($clientEloquent->surname),
            new ClientSecondSurname($clientEloquent->second_surname),
            new ClientAddress($clientEloquent->address),
            new ClientPhone($clientEloquent->phone),
            new ClientJob($clientEloquent->job),
            new ClientDepartment($clientEloquent->department),
            new ClientCity($clientEloquent->city),
            new ClientIdentification($clientEloquent->identification),
            new ClientIdentificationType($clientEloquent->identification_type)
        );
    }
}
