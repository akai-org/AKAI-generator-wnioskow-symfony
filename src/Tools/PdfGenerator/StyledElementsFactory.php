<?php

namespace App\Tools\PdfGenerator;

use DateTimeImmutable;

interface StyledElementsFactory
{
    public function achievement(
        string             $content,
        ?DateTimeImmutable $startDate,
        ?DateTimeImmutable $endDate
    ): \Stringable;
}