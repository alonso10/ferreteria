<?php
declare(strict_types=1);

namespace Src\BoundedContext\Clients\Application;

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
use function Lambdish\Phunctional\map;

class AllClientUseCase
{
    private $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(): array {
        return map($this->toDomain(), $this->repository->searchAll());
    }

    private function toDomain(): callable {
        return static function ($client) {
            return new Client(
                new ClientId($client['id']),
                new ClientEmail($client['email']),
                new ClientFirstName($client['first_name']),
                new ClientSecondName($client['second_name']),
                new ClientSurname($client['surname']),
                new ClientSecondSurname($client['second_surname']),
                new ClientAddress($client['address']),
                new ClientPhone($client['phone']),
                new ClientJob($client['job']),
                new ClientDepartment($client['department']),
                new ClientCity($client['city']),
                new ClientIdentification($client['identification']),
                new ClientIdentificationType($client['identification_type']),
            );
        };
    }

}
