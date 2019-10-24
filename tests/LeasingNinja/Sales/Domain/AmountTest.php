<?php
declare(strict_types=1);

namespace LeasingNinja\Sales\Domain;

use PHPUnit\Framework\TestCase;

class AmountTest extends TestCase
{
    public function givenTwoEqualAmounts_whenEquals_thenAreEqual(): void
    {
        // given
        /** @var Amount $amount1 */
        $amount1 = Amount::of(100, "EUR");
        /** @var Amount $amount2 */
        $amount2 = Amount::of(100, "EUR");

        // when
        /** @var bool $areEqual */
        $areEqual = amount1.equals(amount2);

        // then
        $this->assertTrue($areEqual);
        //$this->assertEquals(true, $areEqual);
        //$this->assertThat($areEqual, $this->equalTo(true));
    }

    public function givenTwoUnequalAmounts_whenEquals_thenAreNotEqual(): void
    {
        // given
        /** @var Amount $amount1 */
        $amount1 = Amount::of(100, "EUR");
        /** @var Amount $amount2 */
        $amount2 = Amount::of(200, "EUR");

        // when
        /** @var bool $areEqual */
        $areEqual = amount1.equals(amount2);

        // then
        $this->assertFalse($areEqual);
    }

}
