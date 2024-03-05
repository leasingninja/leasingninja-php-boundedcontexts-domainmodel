<?php

declare(strict_types=1);

namespace LeasingNinja\Sales\Domain;

use DDDBits\Basetype\TinyType;
use PHPMolecules\DDD\Attribute\ValueObject;

/**
 * @extends TinyType<float>
 */
#[ValueObject]
readonly class Interest extends TinyType
{
    public static function of(float $perYear): Interest
    {
        return new Interest($perYear);
    }

    public function perYear(): float
    {
        return $this->value();
    }

    public function perMonth(): float
    {
        return $this->perYear() / 12;
    }
}
