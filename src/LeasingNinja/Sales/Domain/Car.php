<?php


namespace LeasingNinja\Sales\Domain;


use DDDBits\Basetype\TinyType;

class Car extends TinyType
{

    public static function of(string $model): Car {
        return new Car($model);
    }

}