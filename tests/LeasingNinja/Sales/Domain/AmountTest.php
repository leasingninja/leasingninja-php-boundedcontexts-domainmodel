<?php

declare(strict_types=1);

namespace LeasingNinja\Sales\Domain;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;

class AmountTest extends TestCase
{
    #[Test]
    public function givenTwoEqualAmounts_whenEquals_thenAreEqual(): void
    {
        // given
        $amount1 = Amount::of(100, Currency::EUR);
        $amount2 = Amount::of(100, Currency::EUR);

        // when
        $areEqual = $amount1->equals($amount2);

        // then
        $this->assertTrue($areEqual);
        //$this->assertEquals(true, $areEqual);
        //$this->assertThat($areEqual, $this->isTrue());
    }

    #[Test]
    public function givenTwoUnequalAmounts_whenEquals_thenAreNotEqual(): void
    {
        // given
        $amount1 = Amount::of(100, Currency::EUR);
        $amount2 = Amount::of(200, Currency::EUR);

        // when
        $areEqual = $amount1->equals($amount2);

        // then
        $this->assertFalse($areEqual);
    }

    #[Test]
    public function givenTwoAmountsWithUnequalCurrencies_whenEquals_thenAreNotEqual():void
    {
        // given
        $amount1 = Amount::of(100, Currency::EUR);
        $amount2 = Amount::of(100, Currency::GBP);

        // when
        $areEqual = $amount1->equals($amount2);

        // then
        $this->assertFalse($areEqual);
    }

    #[Test]
    public function givenTwoAmountsWithRoundingAfterThePoint_whenEquals_thenAreEqual(): void
    {
        // given
        $amount1 = Amount::of(100.45, Currency::EUR);
        $amount2 = Amount::of(100.447123, Currency::EUR);

        // when
        $areEqual = $amount1->equals($amount2);

        // then
        $this->assertTrue($areEqual);
    }

    #[Test]
    public function givenAnAmountsWithCents_whenToString_thenAfterThePointIsCorrectlyPrinted(): void
    {
        // given
        $amount = Amount::of(100.45, Currency::EUR);

        // when
        $amountString = $amount->__toString();

        // then
        $this->assertThat($amountString, $this->equalTo("EUR 100.45"));
    }

    #[Test]
    public function givenTwoAmountsOfEurosAndCents_whenEquals_thenAreEqual(): void
    {
        // given
        $amount1 = Amount::of(100.45, Currency::EUR);
        $amount2 = Amount::ofCents(10045, Currency::EUR);

        // when
        $areEqual = $amount1->equals($amount2);

        // then
        $this->assertTrue($areEqual);
    }
}
