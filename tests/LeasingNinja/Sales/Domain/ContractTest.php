<?php
declare(strict_types=1);

namespace LeasingNinja\Sales\Domain;

use PHPUnit\Framework\TestCase;

class ContractTest extends TestCase
{
    public function test_givenANewContract_whenSign_thenContractIsSigned(): void
    {
        // given
        $nr = Amount::of(4711, "EUR");
        $nr = ContractNumber::of("4711");
        $contract = new Contract(ContractNumber::of("4711"), Customer::of("John Buyer"),
				Car::of("Mercedes Benz C-Class"), Amount::of(20000, "EUR"));

		// when
		$contract->sign(SignDate::of(2018, 12, 24));

		// then
        $this->assertEquals();
		assertThat($contract->isSigned())->isEqualTo(true);
		// check that event ContractSigned is fired
	}

}
