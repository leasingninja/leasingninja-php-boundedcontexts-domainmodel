<?php


namespace DDDBits\Basetype;


/**
 * @template ID of object
 */
abstract class Entity
{
    /**
	 * @var ID
	 */
	private /*final*/ $identity;

	/**
 	 * @param ID $identity
 	 */
	protected function __construct($identity)
	{
		assert($identity != null);

        $this->identity = $identity;
    }

	/**
	 * @return ID
	 */
    public final function identity()
	{
		return $this->identity;
	}

	public function __toString(): string
	{
		return __CLASS__ . " [id=" . $this->identity() . "]";
	}

	/**
 	 * @param Entity<ID> $other
 	 */
	public final function equals($other): bool
	{
		return $this->identity() === $other->identity();
	}

}