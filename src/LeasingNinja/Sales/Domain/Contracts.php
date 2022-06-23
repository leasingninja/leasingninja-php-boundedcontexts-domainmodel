<?php

namespace LeasingNinja\Sales\Domain;

use PHPMolecules\DDD\Attribute\Repository;

#[Repository]
interface Contracts
{
    public function with(ContractNumber $number): Contract;

    public function save(Contract $contract): void;
}
