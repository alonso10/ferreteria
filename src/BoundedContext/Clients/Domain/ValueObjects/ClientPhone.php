<?php

declare(strict_types=1);

namespace Src\BoundedContext\Clients\Domain\ValueObjects;

use InvalidArgumentException;

final class ClientPhone
{
    private $value;

    public function __construct(int $value)
    {
        $this->validate($value);
        $this->value = $value;
    }

    public function value(): int {
        return $this->value;
    }

    /**
     * @param int $value
     * @throws InvalidArgumentException
     */
    private function validate(int $value): void
    {
        if (!filter_var($value, FILTER_VALIDATE_INT)) {
            throw new InvalidArgumentException(
                sprintf('<%s> does not allow the invalid phone: <%s>.', ClientPhone::class, $value)
            );
        }
    }
}
