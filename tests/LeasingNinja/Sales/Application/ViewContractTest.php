<?php

declare(strict_types=1);

namespace LeasingNinja\Sales\Application;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;

use LeasingNinja\Sales\Application\ViewContract;

use LeasingNinja\Sales\Domain\Amount;
use LeasingNinja\Sales\Domain\Car;
use LeasingNinja\Sales\Domain\Contract;
use LeasingNinja\Sales\Domain\ContractNumber;
use LeasingNinja\Sales\Domain\Contracts;
use LeasingNinja\Sales\Domain\Currency;
use LeasingNinja\Sales\Domain\Customer;

//@ExtendWith(MockitoExtension.class)
final class ViewContractTest extends TestCase
{

    /*
	@Mock
	private Contracts contractsMock;

	@InjectMocks
	private ViewContract viewContractUnderTest;
    */

	#[Test]
	function givenAContract_WhenViewContract_ThenContractIsReturned(): void
    {
        // Prepare
        $contractsMock = $this->createMock(Contracts::class);
        $viewContractUnderTest = new ViewContract($contractsMock);

        // Given
        $contractsMock->method('with')
            ->with(ContractNumber::of("4711"))
            ->willReturn(
                new Contract(
                    ContractNumber::of("4711"),
                    Customer::of("Bob Smith"),
                    Car::of("Mercedes Benz E class"),
                    Amount::of(10_000, Currency::EUR)
                )
            );

		// When
		$contract = $viewContractUnderTest->with(ContractNumber::of("4711"));

		// Then
		$this->assertEquals($contract,
				new Contract(
					ContractNumber::of("4711"),
					Customer::of("Bob Smith"),
					Car::of("Mercedes Benz E class"),
					Amount::of(10_000, Currency::EUR)));
	}

}
