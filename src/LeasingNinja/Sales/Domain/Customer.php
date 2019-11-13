<?php


namespace LeasingNinja\Sales\Domain;


use DDDBits\Basetype\TinyType;

class Customer extends TinyType
{

    public static function of(string $name): Customer {
        return new Customer($name);
    }

}