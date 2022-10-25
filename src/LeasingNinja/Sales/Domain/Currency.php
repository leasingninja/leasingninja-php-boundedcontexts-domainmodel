<?php

declare(strict_types=1);

namespace LeasingNinja\Sales\Domain;

use PHPMolecules\DDD\Attribute\ValueObject;

#[ValueObject]
enum Currency
{
    case EUR;
    case GBP;
    case USD;
}
