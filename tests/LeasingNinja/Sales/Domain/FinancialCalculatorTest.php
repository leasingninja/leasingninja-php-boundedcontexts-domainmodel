<?php

declare(strict_types=1);

namespace LeasingNinja\Sales\Domain;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;

final class FinancialCalculatorTest extends TestCase
{
	#[Test]
	function pmt(): void
    {
		// given

		// when
		$pmt = FinancialCalculator::pmt(48.0, 0.3, -40_000.0, 0.0, 0.0);

		// then
		$this->assertThat($pmt, $this->EqualTo(896.0200583908082));
	}
}
