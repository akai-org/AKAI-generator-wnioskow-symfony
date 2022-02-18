<?php

namespace App\Entity;

class Club
{
    /** @var string */
    private $leaderName;

    /** @var string */
    private $groupName;

    /** @var string */
    private $departmentName;

    /** @var string */
    private $patronName;

    public function __construct(
        string $leaderName,
        string $clubName,
        string $departmentName,
        string $patronName
    )
    {
        $this->leaderName = $leaderName;
        $this->groupName = $clubName;
        $this->departmentName = $departmentName;
        $this->patronName = $patronName;
    }

    public function leaderName(): string
    {
        return $this->leaderName;
    }

    public function name(): string
    {
        return $this->groupName;
    }

    public function departmentName(): string
    {
        return $this->departmentName;
    }

    public function patronName(): string
    {
        return $this->patronName;
    }
}