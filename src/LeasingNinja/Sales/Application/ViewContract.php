<?php

declare(strict_types=1);

namespace LeasingNinja\Sales\Application;

use PHPMolecules\DDD\Attribute\Service;

use LeasingNinja\Sales\Domain\Contract;
use LeasingNinja\Sales\Domain\ContractNumber;
use LeasingNinja\Sales\Domain\Contracts;

#[Service]
final class ViewContract
{
    private Contracts $contracts;

    public function __construct(Contracts $contracts)
    {
        $this->contracts = $contracts;
    }

    public function with(ContractNumber $number): Contract
    {
        $contract = $this->contracts->with($number);
        return $contract;
    }
}
