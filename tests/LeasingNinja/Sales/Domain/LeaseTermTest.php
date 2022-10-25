<?php

declare(strict_types=1);

namespace LeasingNinja\Sales\Domain;

use PHPUnit\Framework\TestCase;

class LeaseTermTest extends TestCase
{
    /**
     * @test
     */
    public function givenNothing_whenALeaseTermIsCreatedOfYears_thenNoOfMonthsIsCorrect(): void
    {
        // given

        // when
        $leaseTerm = LeaseTerm::ofYears(4);

        // then
        $this->assertThat($leaseTerm->noOfMonths(), $this->EqualTo(48));
    }
}
