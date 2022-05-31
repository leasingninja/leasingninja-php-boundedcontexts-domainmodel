<?php
declare(strict_types=1);

namespace DDDBits\Basetype;


/**
 * @template V of int|float|string|object
 */
abstract class TinyType
{
	/**
	 * @var V
	 */
    private $value;

	/**
	 * @param V $value
	 */
	protected function __construct($value)
    {
		$this->value = $value;
	}

	/**
	 * @return V
	 */
    public function value()
    {
		return $this->value;
	}

	public function __toString(): string
    {
		return TinyType::class . " [" . $this->value() . "]";
	}

	/**
	 * @param TinyType<V> $other
	 */
	public function equals(TinyType $other): bool
    {
        return $this->value === $other->value;
	}

}