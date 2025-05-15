<?php

declare(strict_types=1);

namespace LeasingNinja\Sales\Domain;

use PHPMolecules\DDD\Attribute\ValueObject;

#[ValueObject]
readonly class Amount
{
    private function __construct(
        private int      $amountInCents,
        private Currency $currency
    ) {}

    public static function of(float $amount, Currency $currency): Amount
    {
		return Amount::ofCents(intval(round($amount * 100)), $currency);
    }

	public static function ofCents(int $amountInCents, Currency $currency): Amount
    {
		return new Amount($amountInCents, $currency);
	}

	public function amount(): float
    {
		return $this->amountInCents / 100.0;
	}

	public function amountInCents(): int
    {
		return $this->amountInCents;
	}

	public function currency(): Currency
    {
		return $this->currency;
	}

    public function equals(object $other): bool
    {
        return $other != null
            && $other instanceof Amount
            && $this->amountInCents === $other->amountInCents
            && $this->currency === $other->currency;
    }

    public function __toString(): string
    {
        return $this->currency->name . " " . $this->amount();
    }
}
