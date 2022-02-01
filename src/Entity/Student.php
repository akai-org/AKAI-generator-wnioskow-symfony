<?php

namespace App\Entity;

class Student
{
    /** @var Achievement[] */
    private $achievements;

    /** @var string */
    private $name;

    /** @var string */
    private $index;

    /** @var string */
    private $position;

    /** @var string */
    private $semester;

    public function __construct(
        string $name,
        string $index,
        string $position,
        string $semester,
        array $achievements
    )
    {
        $this->name = $name;
        $this->index = $index;
        $this->position = $position;
        $this->semester = $semester;
        $this->achievements = $achievements;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function index(): string
    {
        return $this->index;
    }

    public function position(): string
    {
        return $this->position;
    }

    public function semester(): string
    {
        return $this->semester;
    }

    public function achievements(): array
    {
        return $this->achievements;
    }
}