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
