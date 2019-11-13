<?php
declare(strict_types=1);


namespace LeasingNinja\Sales\Domain;


class Contract
{
    public function __construct(ContractNumber $number, Customer $customer, Car $car, Amount $amount)
    {
    }
}