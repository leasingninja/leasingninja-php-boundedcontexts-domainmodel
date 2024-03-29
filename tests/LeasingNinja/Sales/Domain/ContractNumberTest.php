<?php

declare(strict_types=1);

namespace LeasingNinja\Sales\Domain;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ContractNumberTest extends TestCase
{
    #[Test]
    public function givenNothing_whenNewContractIsCreated_thenContractHasCorrectNumber(): void
    {
        // given

        // when
        $nr = ContractNumber::of("4711");

        // then
        $this->assertThat($nr->value(), $this->equalTo("4711"));
    }
}
