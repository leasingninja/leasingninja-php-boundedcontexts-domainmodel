<?php

declare(strict_types=1);

namespace DDDBits\Basetype;

use Stringable;

/**
 * @template V of int|float|string|Stringable
 */
abstract readonly class TinyType
{
    /**
     * @param V $value
     */
    protected function __construct(
        private readonly int|float|string|Stringable $value
    ) {}

    /**
     * @return V
     */
    public function value(): int|float|string|Stringable
    {
        return $this->value;
    }

    #[\Override]
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
            //&& gettype($this) === gettype($other)
            && $this->value === $other->value;
    }
}
