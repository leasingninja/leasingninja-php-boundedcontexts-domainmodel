<?php

declare(strict_types=1);

namespace LeasingNinja\Sales\Infrastructure;

use PHPUnit\Framework\TestCase;
use LeasingNinja\Sales\Domain\Amount;
use LeasingNinja\Sales\Domain\Car;
use LeasingNinja\Sales\Domain\Contract;
use LeasingNinja\Sales\Domain\ContractNumber;
use LeasingNinja\Sales\Domain\Currency;
use LeasingNinja\Sales\Domain\Customer;

final class ContractsMemImplTest extends TestCase
{
    private ContractsMemImpl $repoUnderTest;

    public function test_contract_can_be_saved_and_retrieved(): void
    {
        // given
        $this->repoUnderTest = new ContractsMemImpl();

        // when
        $this->repoUnderTest->save(new Contract(
            ContractNumber::of("4711"),
            Customer::of("John Buyer"),
            Car::of("Mercedes Benz C class"),
            Amount::of(20_000, Currency::EUR)
        ));
        $contract = $this->repoUnderTest->with(ContractNumber::of("4711"));

        // then
        $this->assertEquals(
            $contract,
            new Contract(
                ContractNumber::of("4711"),
                Customer::of("John Buyer"),
                Car::of("Mercedes Benz C class"),
                Amount::of(20_000, Currency::EUR)
            )
        );
    }
}
