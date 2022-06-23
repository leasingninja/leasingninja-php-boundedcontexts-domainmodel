<?php

declare(strict_types=1);

namespace LeasingNinja\Sales\Domain;

use DDDBits\Basetype\TinyType;
use PHPMolecules\DDD\Attribute\ValueObject;

/**
 * @extends TinyType<string>
 */
#[ValueObject]
class Car extends TinyType
{
    public static function of(string $model): Car
    {
        return new Car($model);
    }
}
