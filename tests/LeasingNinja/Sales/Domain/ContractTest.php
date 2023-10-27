<?php

declare(strict_types=1);

namespace LeasingNinja\Sales\Domain;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;

final class ContractTest extends TestCase
{
    #[Test]
    public function givenAFilledOutContract_whenCalculate_thenInstallmentIsX(): void
    {
        // given
        $contract = new Contract(
            ContractNumber::of("4711"),
            Customer::of("John Buyer"),
            Car::of("Volkswagen ID.3"),
            Amount::of(40_000, Currency::EUR)
        );

        // when
        $contract->calculateInstallmentFor(LeaseTerm::ofMonths(48), Interest::of(3.7));

        // then
        $this->assertTrue($contract->isCalculated());
        $this->assertThat($contract->installment(), $this->equalTo(Amount::of(897.80, Currency::EUR)));
    }

    #[Test]
    public function givenANewContract_whenSign_thenContractIsSigned(): void
    {
        // given
        $contract = new Contract(
            ContractNumber::of("4711"),
            Customer::of("John Buyer"),
            Car::of("Mercedes Benz C-Class"),
            Amount::of(20_000, Currency::EUR)
        );

        // when
        $contract->sign(SignDate::of(2018, 12, 24));

        // then
        $this->assertThat($contract->isSigned(), $this->equalTo(true));
        $this->assertThat($contract->signDate(), $this->equalTo(SignDate::of(2018, 12, 24)));
        // check that event ContractSigned is fired
    }
}
