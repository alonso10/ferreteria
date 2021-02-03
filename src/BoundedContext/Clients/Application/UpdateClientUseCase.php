<?php
declare(strict_types=1);

namespace Src\BoundedContext\Clients\Application;


use Src\BoundedContext\Clients\Domain\Client;
use Src\BoundedContext\Clients\Domain\Contract\ClientRepository;
use Src\BoundedContext\Clients\Domain\ValueObjects\ClientId;
use Src\BoundedContext\Clients\Domain\ValueObjects\ClientEmail;
use Src\BoundedContext\Clients\Domain\ValueObjects\ClientFirstName;
use Src\BoundedContext\Clients\Domain\ValueObjects\ClientSecondName;
use Src\BoundedContext\Clients\Domain\ValueObjects\ClientSurname;
use Src\BoundedContext\Clients\Domain\ValueObjects\ClientSecondSurname;
use Src\BoundedContext\Clients\Domain\ValueObjects\ClientAddress;
use Src\BoundedContext\Clients\Domain\ValueObjects\ClientPhone;
use Src\BoundedContext\Clients\Domain\ValueObjects\ClientJob;
use Src\BoundedContext\Clients\Domain\ValueObjects\ClientDepartment;
use Src\BoundedContext\Clients\Domain\ValueObjects\ClientCity;
use Src\BoundedContext\Clients\Domain\ValueObjects\ClientIdentificationType;
use Src\BoundedContext\Clients\Domain\ValueObjects\ClientIdentification;

class UpdateClientUseCase
{
    private $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(
        string $clientId,
        string $clientEmail,
        string $clientFirstName,
        string $clientSecondName,
        string $clientSurname,
        string $clientSecondSurname,
        string $clientAddress,
        int $clientPhone,
        string $clientJob,
        string $clientDepartment,
        string $clientCity,
        string $clientIdentification,
        string $clientIdentificationType
    ): void {
        $id                 = new ClientId($clientId);
        $email              = new ClientEmail($clientEmail);
        $firstName          = new ClientFirstName($clientFirstName);
        $secondName         = new ClientSecondName($clientSecondName);
        $surname            = new ClientSurname($clientSurname);
        $secondSurname      = new ClientSecondSurname($clientSecondSurname);
        $address            = new ClientAddress($clientAddress);
        $phone              = new ClientPhone($clientPhone);
        $job                = new ClientJob($clientJob);
        $department         = new ClientDepartment($clientDepartment);
        $city               = new ClientCity($clientCity);
        $identification     = new ClientIdentification($clientIdentification);
        $identificationType = new ClientIdentificationType($clientIdentificationType);

        $client = Client::create(
            $id,
            $email,
            $firstName,
            $secondName, $surname,
            $secondSurname,
            $address,
            $phone,
            $job,
            $department,
            $city,
            $identification,
            $identificationType
        );

        $this->repository->update($id, $client);
    }

}
