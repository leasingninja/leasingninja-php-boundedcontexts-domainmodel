<?php

declare(strict_types=1);

namespace LeasingNinja\Sales\Domain;

use DDDBits\Basetype\TinyType;
use PHPMolecules\DDD\Attribute\ValueObject;

/**
 * @extends TinyType<int>
 */
#[ValueObject]
class LeaseTerm extends TinyType
{
    public static function ofMonths(int $noOfMonths): LeaseTerm
    {
        return new LeaseTerm($noOfMonths);
    }

    public static function ofYears(int $noOfYears): LeaseTerm
    {
        return new LeaseTerm($noOfYears * 12);
    }

    public function noOfMonths(): int
    {
        return $this->value();
    }
}
