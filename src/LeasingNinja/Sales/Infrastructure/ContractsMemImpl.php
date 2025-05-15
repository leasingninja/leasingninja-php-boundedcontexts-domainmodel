<?php

declare(strict_types=1);

namespace LeasingNinja\Sales\Infrastructure;

use LeasingNinja\Sales\Domain\Contract;
use LeasingNinja\Sales\Domain\ContractNumber;
use LeasingNinja\Sales\Domain\Contracts;

final class ContractsMemImpl implements Contracts
{
    /** @var array<string, Contract> */
    private array $repo = [];

    public function save(Contract $contract): void
    {
        $this->repo[$contract->number()->value()] = $contract;
    }

    public function with(ContractNumber $number): Contract
    {
        return $this->repo[$number->value()];
    }
}
