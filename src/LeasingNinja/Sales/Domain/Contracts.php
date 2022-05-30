<?php


namespace LeasingNinja\Sales\Domain;

use PHPMolecules\DDD\Attribute\Repository;

#[Repository]
interface Contracts
{

    function with(ContractNumber $number): Contract;

    function save(Contract $contract): void;

}