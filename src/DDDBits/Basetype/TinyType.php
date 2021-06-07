<?php
declare(strict_types=1);

namespace DDDBits\Basetype;


abstract class TinyType
{
    private int|float|string|object $value;

	protected function __construct(int|float|string|object $value)
    {
		$this->value = $value;
	}

    public function value(): int|float|string|object
    {
		return $this->value;
	}

	public function __toString(): string
    {
		return TinyType::class + " [" + $this->value() + "]";
	}

	public function equals(TinyType $other): bool
    {
        return $this->value === $other->value;
	}

}