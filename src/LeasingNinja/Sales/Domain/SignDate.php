<?php

declare(strict_types=1);

namespace LeasingNinja\Sales\Domain;

use DateTimeImmutable;

use PHPMolecules\DDD\Attribute\ValueObject;

#[ValueObject]
readonly class SignDate
{
    public function __construct(
        private DateTimeImmutable $dateTime
    ) {}

    public static function of(int $year, int $month, int $day): SignDate
    {
        $date = new DateTimeImmutable();
        $date = $date->setTime(0, 0);
        return new SignDate($date->setDate($year, $month, $day));
    }

    public function equals(SignDate $other): bool
    {
        return $other != null
            && $this->dateTime === $other->dateTime;
    }
}
