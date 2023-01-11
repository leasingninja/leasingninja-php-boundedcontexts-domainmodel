<?php

declare(strict_types=1);

namespace DDDBits\Basetype;

/**
 * @template V of int|float|string|object
 */
abstract class TinyType
{
    /**
     * @var V
     */
    private readonly int|float|string|object $value;

    /**
     * @param V $value
     */
    protected function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return V
     */
    public function value(): int|float|string|object
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return TinyType::class . " [" . $this->value . "]";
    }

    /**
     * @param TinyType<V> $other
     */
    public function equals(TinyType $other): bool
    {
        return $other != null
            && gettype($this) === gettype($other)
            && $this->value === $other->value;
    }
}
