<?php

declare(strict_types=1);

namespace LeasingNinja\Sales\Domain;

use PHPMolecules\DDD\Attribute\ValueObject;

#[ValueObject]
class Amount
{
    private readonly int $amountInCents;
    private readonly Currency $currency;

    private function __construct(int $amountInCents, Currency $currency)
    {
        $this->amountInCents = $amountInCents;
        $this->currency = $currency;
    }

    public static function of(float $amount, Currency $currency): Amount
    {
        assert($currency != null);

		return Amount::ofCents(intval(round($amount * 100)), $currency);
    }

	public static function ofCents(int $amountInCents, Currency $currency): Amount
    {
		assert($currency != null);

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

    public function equals(Amount $other): bool
    {
        // TODO: null safety
        return $this->amountInCents === $other->amountInCents
            && $this->currency === $other->currency;
    }

    public function __toString(): string
    {
        return $this->currency->name . " " . $this->amount();
    }
}
