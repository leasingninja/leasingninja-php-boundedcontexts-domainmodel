<?php
declare(strict_types=1);

namespace DDDBits\Basetype;


abstract class TinyType
{
    private $value;

	protected function __construct($value)
    {
		$this->value = $value;
	}

    public function value()
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