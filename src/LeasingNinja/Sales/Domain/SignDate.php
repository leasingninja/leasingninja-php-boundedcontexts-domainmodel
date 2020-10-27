<?php


namespace LeasingNinja\Sales\Domain;


use DateTimeImmutable;
use DDDBits\Basetype\TinyType;

class SignDate extends TinyType
{

    public static function of($year, $month, $day): SignDate {
        $date = new DateTimeImmutable();
        return new SignDate($date->setDate($year, $month, $day));
    }

}