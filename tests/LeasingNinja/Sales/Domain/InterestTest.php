<?php

declare(strict_types=1);

namespace LeasingNinja\Sales\Domain;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;

class InterestTest extends TestCase
{
    #[Test]
    public function givenAnInterest_whenPerMonth_thenCorrectValue(): void
    {
        // given
        $interest = Interest::of(3.6);

        // when
        $perMonth = $interest->perMonth();

        // then
        $this->assertThat($perMonth, $this->EqualTo(0.3));
    }
}
