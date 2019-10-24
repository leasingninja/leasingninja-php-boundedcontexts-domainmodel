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
        assertThat(areEqual).isTrue();
    }

}
