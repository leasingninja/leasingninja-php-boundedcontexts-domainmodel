<?php


namespace LeasingNinja\Sales\Domain;


use DDDBits\Basetype\TinyType;
use PHPMolecules\DDD\Attribute\ValueObject;

#[ValueObject]
class Car extends TinyType
{

    public static function of(string $model): Car {
        return new Car($model);
    }

}