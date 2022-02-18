<?php

namespace App\Tools\PdfGenerator\Latex;

use App\Tools\PdfGenerator\StyledElementsFactory;
use DateTimeImmutable;

class LatexStyledElementsFactory implements StyledElementsFactory
{
    public function achievement(
        string $content,
        ?DateTimeImmutable $startDate,
        ?DateTimeImmutable $endDate
    ): \Stringable
    {
        return new LatexAchievement(
            $content,
            $startDate,
            $endDate
        );
    }
}