<?php


namespace Src\BoundedContext\Clients\Domain\ValueObjects;


use InvalidArgumentException;
use Src\Shared\Domain\ValueObject\StringValueObject;

final class ClientDepartment extends StringValueObject
{
    const MAX_LENGTH = 10;

    public function __construct(string $value)
    {
        parent::__construct($value);
        $this->validate($value);
    }

    /**
     * @param string $value
     * @throws InvalidArgumentException
     */
    private function validate(string $value): void
    {
        if (strlen($value) > self::MAX_LENGTH) {
            throw new InvalidArgumentException(
                sprintf(
                    '<%s> text must be less than %s characters: %s.',
                    ClientDepartment::class,
                    self::MAX_LENGTH,
                    $value)
            );
        }
    }
}
