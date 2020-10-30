<?php


namespace LeasingNinja\Sales\Domain;


interface Contracts
{

    function with(ContractNumber $number): Contract;

    function save(Contract $contract);

}