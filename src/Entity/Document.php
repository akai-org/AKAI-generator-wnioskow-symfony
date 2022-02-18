<?php

namespace App\Entity;

class Document
{
    /** @var Club */
    private $club;

    /** @var Student */
    private $student;

    public function __construct(
        Club    $club,
        Student $student
    )
    {
        $this->club = $club;
        $this->student = $student;
    }

    public function club(): Club
    {
        return $this->club;
    }

    public function student(): Student
    {
        return $this->student;
    }
}
