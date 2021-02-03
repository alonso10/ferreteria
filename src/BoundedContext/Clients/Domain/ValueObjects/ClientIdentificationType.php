<?php
declare(strict_types=1);

namespace Src\BoundedContext\Clients\Domain\ValueObjects;


use InvalidArgumentException;
use Src\Shared\Domain\ValueObject\StringValueObject;

final class ClientIdentificationType extends StringValueObject
{
    const MAX_LENGTH = 2;
    const IDENTIFICATION_VALID = ['CC', 'RC', 'TI', 'AS', 'MS', 'PA'];

    public function __construct(string $value)
    {
        parent::__construct($value);
        $this->validateLength($value);
        $this->validateType($value);
    }

    /**
     * @param string $value
     * @throws InvalidArgumentException
     */
    private function validateLength(string $value): void
    {
        if (strlen($value) > self::MAX_LENGTH) {
            throw new InvalidArgumentException(
                sprintf(
                    '<%s> text must be less than <%s> characters: <%s>.',
                    ClientIdentificationType::class,
                    self::MAX_LENGTH,
                    $value)
            );
        }
    }

    /**
     * @param string $value
     * @throws InvalidArgumentException
     */
    private function validateType(string $value): void
    {
        if (!in_array($value, self::IDENTIFICATION_VALID)) {
            throw new InvalidArgumentException(
                sprintf(
                    '<%s> value not allowed <%s>, values valid <%s>',
                    ClientIdentificationType::class,
                    $value,
                    implode(" ", self::IDENTIFICATION_VALID)
                )
            );
        }
    }
}
