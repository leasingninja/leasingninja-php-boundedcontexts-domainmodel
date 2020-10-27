<?php

namespace LeasingNinja\Sales\Domain;

use PHPUnit\Framework\TestCase;

class ContractNumberTest extends TestCase
{
    public function test_givenANewContract_whenSign_thenContractIsSigned(): void
    {
        // given
        $nr = ContractNumber::of("4711");
        // when

        // then
        $this->assertThat($nr->value(), $this->equalTo("4711"));
    }
}
