<?php
declare(strict_types=1);


namespace LeasingNinja\Sales\Domain;


class Contract
{
    private /*final*/ Customer $lessee;
	private /*final*/ Car $car;
	private /*final*/ Amount $price;
	private SignDate $signDate;

    public function __construct(ContractNumber $number, Customer $lessee, Car $car, Amount $price)
    {
        // $this->number = $number;
        $this->lessee = $lessee;
        $this->car = $car;
        $this->price = $price;
    }

    public function sign(SignDate $date) {
		//assert date != null;
		//if(!$this->isSigned())
		//    bla();

		$this->signDate = $date;

		//assert isSigned();
	}

    public function isSigned(): bool {
		return $this->signDate != null;
	}
}