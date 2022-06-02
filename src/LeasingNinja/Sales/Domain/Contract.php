<?php
declare(strict_types=1);


namespace LeasingNinja\Sales\Domain;

use PHPMolecules\DDD\Attribute\Entity;
use PHPMolecules\DDD\Attribute\Identity;

/**
 * @extends \DDDBits\Basetype\Entity<ContractNumber>
 */
#[Entity]
class Contract extends \DDDBits\Basetype\Entity
{
    private /*final*/ Customer $lessee;
	private /*final*/ Car $car;
	private /*final*/ Amount $price;
	private SignDate $signDate;

    public function __construct(ContractNumber $number, Customer $lessee, Car $car, Amount $price)
    {
        parent::__construct($number);
        $this->lessee = $lessee;
        $this->car = $car;
        $this->price = $price;
    }

    #[Identity]
    public function number(): ContractNumber
    {
        return parent::identity();
    }

	public function lessee(): Customer
    {
		return $this->lessee;
	}
	
	public function car(): Car
    {
		return $this->car;
	}
	
	public function price(): Amount
    {
		return $this->price;
	}

    public function sign(SignDate $date): void {
		assert($date != null);
		assert(!$this->isSigned());
	
		$this->signDate = $date;

		assert($this->isSigned());
	}

    public function isSigned(): bool {
		return isset($this->signDate);
	}
}
