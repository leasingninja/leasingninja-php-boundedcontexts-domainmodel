<?php

declare(strict_types=1);

namespace LeasingNinja\Sales\Domain;

use PHPMolecules\DDD\Attribute\Entity;
use PHPMolecules\DDD\Attribute\Identity;

readonly class Calculation
{
    public function __construct(
        public LeaseTerm $leaseTerm,
        public Interest $interest,
        public Amount $installment
    ) {}
}

/**
 * @extends \DDDBits\Basetype\Entity<ContractNumber>
 */
#[Entity]
class Contract extends \DDDBits\Basetype\Entity
{
    private Calculation $calculation;

    private SignDate $signDate;

    public function __construct(
        ContractNumber $number,
        public readonly Customer $lessee,
        public readonly Car $car,
        public readonly Amount $price)
    {
        parent::__construct($number);
    }

    #[Identity]
    public function number(): ContractNumber
    {
        return $this->identity;
    }

	public function isCalculated(): bool
    {
		return isset($this->calculation);
	}

    public function calculateInstallmentFor(LeaseTerm $leaseTerm, Interest $interest): void
    {
		assert($leaseTerm != null);
        assert($interest != null);
		assert(!$this->isSigned());

		$inAdvance = 0.0;
		$residualValue = 0.0;

		$pmt = FinancialCalculator::pmt(
			$leaseTerm->noOfMonths(),
			$interest->perMonth(),
			-1 * $this->price->amount(),
			$residualValue,
			$inAdvance);

		$this->calculation = new Calculation($leaseTerm, $interest, Amount::of($pmt, $this->price->currency()));

		assert($this->isCalculated());
	}

    public function leaseTerm(): LeaseTerm
    {
    	assert($this->isCalculated());
	    return $this->calculation->leaseTerm;
    }

    public function interest(): Interest
    {
    	assert($this->isCalculated());
	    return $this->calculation->interest;
    }

	public function installment(): Amount
    {
    	assert($this->isCalculated());
		return $this->calculation->installment;
	}

    public function sign(SignDate $date): void
    {
        assert($date != null);
        assert(!$this->isSigned());

        $this->signDate = $date;

        assert($this->isSigned());
    }

    public function isSigned(): bool
    {
        return isset($this->signDate);
    }

    public function signDate(): SignDate
    {
        assert($this->isSigned());

        return $this->signDate;
    }
}
