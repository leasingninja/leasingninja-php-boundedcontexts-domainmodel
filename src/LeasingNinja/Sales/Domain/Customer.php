<?php

declare(strict_types=1);

namespace LeasingNinja\Sales\Domain;

use DDDBits\Basetype\TinyType;
use PHPMolecules\DDD\Attribute\ValueObject;

/**
 * @extends TinyType<string>
 */
#[ValueObject]
readonly class Customer extends TinyType
{
    public static function of(string $name): Customer
    {
        return new Customer($name);
    }
}
