<?php

declare(strict_types=1);

namespace LeasingNinja\Sales\Application;

use PHPMolecules\DDD\Attribute\Service;

use LeasingNinja\Sales\Domain\Amount;
use LeasingNinja\Sales\Domain\Car;
use LeasingNinja\Sales\Domain\Contract;
use LeasingNinja\Sales\Domain\ContractNumber;
use LeasingNinja\Sales\Domain\Contracts;
use LeasingNinja\Sales\Domain\Customer;

#[Service]
class FilloutContract
{
	private readonly Contracts $contracts;

	public function __construct(Contracts $contracts)
    {
		$this->contracts = $contracts;
	}

	public function with(ContractNumber $number, Customer $customer, Car $car, Amount $amount): void
    {
		$this->contracts->save(new Contract(
				$number,
				$customer,
				$car,
				$amount));
	}
}
