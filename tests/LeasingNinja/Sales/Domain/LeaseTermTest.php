<?php

declare(strict_types=1);

namespace LeasingNinja\Sales\Domain;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;

class LeaseTermTest extends TestCase
{
    #[Test]
    public function givenNothing_whenALeaseTermIsCreatedOfYears_thenNoOfMonthsIsCorrect(): void
    {
        // given

        // when
        $leaseTerm = LeaseTerm::ofYears(4);

        // then
        $this->assertThat($leaseTerm->noOfMonths(), $this->EqualTo(48));
    }
}
