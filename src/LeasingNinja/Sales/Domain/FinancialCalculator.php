<?php

declare(strict_types=1);

namespace LeasingNinja\Sales\Domain;

use PHPMolecules\DDD\Attribute\Service;

/**
 * Simulates the infamous HP12c calculator that is widely used in the leasing industry.
 */
#[Service]
readonly final class FinancialCalculator
{
	public static function pmt(float $n, float $iInPercent, float $pv, float $fv, float $s): float
    {
		$i = $iInPercent / 100.0;

        if ($i == 0.0) {
            return (-1 * $pv - $fv) / $n;
        }

		return ($i * ($fv + $pv * ((1 + $i) ** $n))) / ((1 + $i * $s) * (1 - ((1 + $i) ** $n)));
	}
}
