<?php

declare(strict_types=1);

namespace LeasingNinja\Sales\Domain;

use DateTimeImmutable;
use DDDBits\Basetype\TinyType;
use PHPMolecules\DDD\Attribute\ValueObject;

/**
 * @extends TinyType<DateTimeImmutable>
 */
#[ValueObject]
class SignDate extends TinyType
{
    public static function of(int $year, int $month, int $day): SignDate
    {
        $date = new DateTimeImmutable();
        $date = $date->setTime(0, 0);
        return new SignDate($date->setDate($year, $month, $day));
    }
}
