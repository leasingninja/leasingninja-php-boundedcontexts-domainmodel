<?php


namespace LeasingNinja\Sales\Domain;


use DateTimeImmutable;
use DDDBits\Basetype\TinyType;
use PHPMolecules\DDD\Attribute\ValueObject;

#[ValueObject]
class SignDate extends TinyType
{

    public static function of(int $year, int $month, int $day): SignDate {
        $date = new DateTimeImmutable();
        return new SignDate($date->setDate($year, $month, $day));
    }

}