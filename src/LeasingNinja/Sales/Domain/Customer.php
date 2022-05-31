<?php


namespace LeasingNinja\Sales\Domain;


use DDDBits\Basetype\TinyType;
use PHPMolecules\DDD\Attribute\ValueObject;

/**
 * @extends TinyType<string>
 */
#[ValueObject]
class Customer extends TinyType
{

    public static function of(string $name): Customer {
        return new Customer($name);
    }

}