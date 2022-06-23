<?php

declare(strict_types=1);

namespace LeasingNinja\Sales\Domain;

use PHPUnit\Framework\TestCase;

class AmountTest extends TestCase
{
    public function testGivenTwoEqualAmounts_whenEquals_thenAreEqual(): void
    {
        // given
        $amount1 = Amount::of(100, "EUR");
        $amount2 = Amount::of(100, "EUR");

        // when
        $areEqual = $amount1->equals($amount2);

        // then
        $this->assertTrue($areEqual);
        //$this->assertEquals(true, $areEqual);
        //$this->assertThat($areEqual, $this->isTrue());
    }

    public function testGivenTwoUnequalAmounts_whenEquals_thenAreNotEqual(): void
    {
        // given
        $amount1 = Amount::of(100, "EUR");
        $amount2 = Amount::of(200, "EUR");

        // when
        $areEqual = $amount1->equals($amount2);

        // then
        $this->assertFalse($areEqual);
    }
}
