<?php
declare(strict_types=1);


namespace LeasingNinja\Sales\Domain;

use PHPMolecules\DDD\Attribute\Entity;

#[Entity]
class Contract
{
    private /*final*/ Customer $lessee;
	private /*final*/ Car $car;
	private /*final*/ Amount $price;
	private SignDate $signDate;

    public function __construct(ContractNumber $number, Customer $lessee, Car $car, Amount $price)
    {
        // $this->number = $number;
        $this->lessee = $lessee;
        $this->car = $car;
        $this->price = $price;
    }

    public function sign(SignDate $date) {
		assert($date != null);
		assert(!$this->isSigned());
	
		$this->signDate = $date;

		assert($this->isSigned());
	}

    public function isSigned(): bool {
		return isset($this->signDate);
	}
}