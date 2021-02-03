<?php
declare(strict_types=1);

namespace Src\BoundedContext\Clients\Domain;

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

class Client
{
    private $id;
    private $email;
    private $firstName;
    private $secondName;
    private $surname;
    private $secondSurname;
    private $address;
    private $phone;
    private $job;
    private $department;
    private $city;
    private $identification;
    private $identificationType;

    public function __construct(
        ClientId $clientId,
        ClientEmail $clientEmail,
        ClientFirstName $clientFirstName,
        ClientSecondName $clientSecondName,
        ClientSurname $clientSurname,
        ClientSecondSurname $clientSecondSurname,
        ClientAddress $clientAddress,
        ClientPhone $clientPhone,
        ClientJob $clientJob,
        ClientDepartment $clientDepartment,
        ClientCity $clientCity,
        ClientIdentification $clientIdentification,
        ClientIdentificationType $clientIdentificationType
    )
    {
        $this->id = $clientId;
        $this->email = $clientEmail;
        $this->firstName = $clientFirstName;
        $this->secondName = $clientSecondName;
        $this->surname = $clientSurname;
        $this->secondSurname = $clientSecondSurname;
        $this->address = $clientAddress;
        $this->phone = $clientPhone;
        $this->job = $clientJob;
        $this->department = $clientDepartment;
        $this->city = $clientCity;
        $this->identification = $clientIdentification;
        $this->identificationType = $clientIdentificationType;
    }

    public static function create(
        ClientId $clientId,
        ClientEmail $clientEmail,
        ClientFirstName $clientFirstName,
        ClientSecondName $clientSecondName,
        ClientSurname $clientSurname,
        ClientSecondSurname $clientSecondSurname,
        ClientAddress $clientAddress,
        ClientPhone $clientPhone,
        ClientJob $clientJob,
        ClientDepartment $clientDepartment,
        ClientCity $clientCity,
        ClientIdentification $clientIdentification,
        ClientIdentificationType $clientIdentificationType
    ): Client {
        return new Client(
            $clientId,
            $clientEmail,
            $clientFirstName,
            $clientSecondName,
            $clientSurname,
            $clientSecondSurname,
            $clientAddress,
            $clientPhone,
            $clientJob,
            $clientDepartment,
            $clientCity,
            $clientIdentification,
            $clientIdentificationType
        );
    }

    /**
     * @return ClientId
     */
    public function id(): ClientId
    {
        return $this->id;
    }

    /**
     * @return ClientEmail
     */
    public function email(): ClientEmail
    {
        return $this->email;
    }

    /**
     * @return ClientFirstName
     */
    public function firstName(): ClientFirstName
    {
        return $this->firstName;
    }

    /**
     * @return ClientSecondName
     */
    public function secondName(): ClientSecondName
    {
        return $this->secondName;
    }

    /**
     * @return ClientSurname
     */
    public function surname(): ClientSurname
    {
        return $this->surname;
    }

    /**
     * @return ClientSecondSurname
     */
    public function secondSurname(): ClientSecondSurname
    {
        return $this->secondSurname;
    }

    /**
     * @return ClientAddress
     */
    public function address(): ClientAddress
    {
        return $this->address;
    }

    /**
     * @return ClientPhone
     */
    public function phone(): ClientPhone
    {
        return $this->phone;
    }

    /**
     * @return ClientJob
     */
    public function job(): ClientJob
    {
        return $this->job;
    }

    /**
     * @return ClientDepartment
     */
    public function department(): ClientDepartment
    {
        return $this->department;
    }

    /**
     * @return ClientCity
     */
    public function city(): ClientCity
    {
        return $this->city;
    }

    /**
     * @return ClientIdentification
     */
    public function identification(): ClientIdentification
    {
        return $this->identification;
    }

    /**
     * @return ClientIdentificationType
     */
    public function identificationType(): ClientIdentificationType
    {
        return $this->identificationType;
    }



}
