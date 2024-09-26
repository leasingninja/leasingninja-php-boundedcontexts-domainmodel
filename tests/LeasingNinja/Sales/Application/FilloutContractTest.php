<?php

declare(strict_types=1);

namespace LeasingNinja\Sales\Application;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;

use LeasingNinja\Sales\Application\FilloutContract;

use LeasingNinja\Sales\Domain\Amount;
use LeasingNinja\Sales\Domain\Car;
use LeasingNinja\Sales\Domain\Contract;
use LeasingNinja\Sales\Domain\ContractNumber;
use LeasingNinja\Sales\Domain\Contracts;
use LeasingNinja\Sales\Domain\Currency;
use LeasingNinja\Sales\Domain\Customer;

final class FilloutContractTest extends TestCase
{
    /*
	@Mock
	private Contracts $contractsMock;

	@InjectMocks
    private FilloutContract $filloutContractUnderTest;
    */

    #[Test]
	function givenEmptyContract_WhenFillout_ThenSave(): void
    {
        // Prepare
        $contractsMock = $this->createMock(Contracts::class);
		$contractsMock->expects($this->once())
            ->method('save')
            ->with($this->equalTo(
                new Contract(
                    ContractNumber::of("4711"),
                    Customer::of("Bob Smith"),
                    Car::of("Mercedes Benz E-Class"),
                    Amount::of(10_000, Currency::EUR))));
        $filloutContractUnderTest = new FilloutContract($contractsMock);

		// Given

		// When
		$filloutContractUnderTest->with(
				ContractNumber::of("4711"),
				Customer::of("Bob Smith"),
				Car::of("Mercedes Benz E-Class"),
				Amount::of(10_000, Currency::EUR));


		// Then
	}
}
