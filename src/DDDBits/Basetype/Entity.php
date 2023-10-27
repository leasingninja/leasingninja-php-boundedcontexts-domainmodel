<?php

declare(strict_types=1);

namespace DDDBits\Basetype;

use Stringable;

/**
 * @template ID of int|float|string|Stringable
 */
abstract class Entity
{
    /**
     * @var ID
     */
    public readonly int|float|string|Stringable $identity;

    /**
     * @param ID $identity
     */
    protected function __construct($identity)
    {
        assert($identity != null);

        $this->identity = $identity;
    }

    public function __toString(): string
    {
        return __CLASS__ . " [id=" . $this->identity . "]";
    }

    /**
     * @param Entity<ID> $other
     */
    final public function equals($other): bool
    {
        return $this->identity === $other->identity;
    }
}
