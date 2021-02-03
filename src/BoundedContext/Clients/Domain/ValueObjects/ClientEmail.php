<?php

declare(strict_types=1);

namespace Src\BoundedContext\Clients\Domain\ValueObjects;

use InvalidArgumentException;

final class ClientEmail
{
    const MAX_LENGTH = 30;

    private $value;

    /**
     * UserEmail constructor.
     * @param string $email
     * @throws InvalidArgumentException
     */
    public function __construct(string $email)
    {
        $this->validate($email);
        $this->validateLength($email);
        $this->value = $email;
    }

    /**
     * @param string $email
     * @throws InvalidArgumentException
     */
    private function validate(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(
                sprintf('<%s> does not allow the invalid email: <%s>.', ClientEmail::class, $email)
            );
        }
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
                    ClientEmail::class,
                    self::MAX_LENGTH,
                    $value)
            );
        }
    }

    public function value(): string
    {
        return $this->value;
    }
}
