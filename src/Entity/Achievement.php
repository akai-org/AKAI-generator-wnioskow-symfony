<?php

namespace App\Entity;

use DateTimeImmutable;

class Achievement
{
    /** @var string */
    private $name;

    /** @var DateTimeImmutable  */
    private $startDate;

    /** @var DateTimeImmutable  */
    private $endDate;

    public function __construct(
        string $name,
        DateTimeImmutable $startDate,
        DateTimeImmutable $endDate
    )
    {
        $this->name = $name;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStartDate(): DateTimeImmutable
    {
        return $this->startDate;
    }

    public function getEndDate(): DateTimeImmutable
    {
        return $this->endDate;
    }
}