<?php
declare(strict_types=1);

namespace LeasingNinja\Sales\Domain;


use DDDBits\Basetype\TinyType;
use PHPMolecules\DDD\Attribute\ValueObject;

#[ValueObject]
class ContractNumber extends TinyType
{

    private function __construct(string $number)
    {
        parent::__construct($number);
    }

    public static function of(string $number): ContractNumber
    {
        return new ContractNumber($number);
    }
}