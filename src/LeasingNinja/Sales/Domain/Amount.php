<?php
declare(strict_types=1);

namespace LeasingNinja\Sales\Domain;

use PHPMolecules\DDD\Attribute\ValueObject;

#[ValueObject]
class Amount
{
    private int $amount;
	private string $currency;

	private function __construct(int $amount, string $currency)
    {
		$this->amount = $amount;
		$this->currency = $currency;
	}

    public static function of(int $amount, String $currency): Amount
    {
        assert($currency != null);

		return new Amount($amount, $currency);
	}

    public function amount(): int
    {
		return $this->amount;
	}

    public function currency(): string {
		return $this->currency;
	}

    public function equals(Amount $other): bool
    {
        return $this->amount === $other->amount
            && $this->currency === $other->currency;
    }

    public function __toString(): string
    {
		return "Amount [" . $this->currency . " "  . $this->amount . "]";
	}
}